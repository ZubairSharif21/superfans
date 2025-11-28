<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Stripe\Stripe;
use Stripe\Product as StripeProduct;
use Stripe\Price as StripePrice;
use App\Models\Product;


use App\Models\Cart;
use App\Models\Influencer_network;
use Session;

use Auth;
use App\Models\Followership;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;

    //protected $redirectTo = '/user';

    protected function redirectTo()
    {

        if (Session::has('other_user_username')) {
            // do some thing if the session is exist
            $other_user_username = Session::get('other_user_username');
            Session::forget('other_user_username');

            $other_user = User::where('username_URL',$other_user_username)->first();
            if($other_user->role == "user") {

                $followed_user_id = $other_user->id;
                $follower_user_id = Auth::user()->id;

                $followership_check = Followership::where('followed_user_id',$followed_user_id)->where('follower_user_id',$follower_user_id)->first();

                if ($followership_check === null) {

                $Followership = new Followership();
                $Followership->followed_user_id = $followed_user_id;
                $Followership->follower_user_id = $follower_user_id;
                $Followership->save();

                $Followed_user = User::find($followed_user_id);
                $Followed_user->no_of_followers = $Followed_user->no_of_followers + 1;
                $Followed_user->save();

                Session::put('message_follow', 'Followed Successfully');

                }

                return '/'.$other_user_username.'';

            } else {

                Session::put('subscribe_this_influencer', 'subscribe_this_influencer');

                return '/'.$other_user_username.'';
            }


        }


        if (auth()->user()->role == "user") {
            return '/user';
        }
        return '/influencer';
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
    

public function showRegistrationForm()
{
    Session::forget('profile_image_name');
    Session::forget('cover_image_name');

    return view('auth.register'); 
}


    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'termsCheckbox' => ['required', 'accepted'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {

        if($data['role'] == "user") {

            if(isset($data['other_user_username'])) {
                Session::put('other_user_username', $data['other_user_username']);
            } else {
                // We cannot do anything there
            }


if (Session::has('profile_image_name')) {
    $profile_imageName = Session::get('profile_image_name');
} else {
    $profile_imageName = null;
}

if (Session::has('cover_image_name')) {
    $cover_imageName = Session::get('cover_image_name');
} else {
    $cover_imageName = null;
}



/*
        if(isset($data['profile_picture'])) {
            // $profile_imageName = rand(1,10).$data['profile_picture']->getClientOriginalName();
            // $imagePath = $data['profile_picture']->move('assets/images', $profile_imageName);
            $profile_imageName = Session::get('image_name');
        } else {
            $profile_imageName = null;
        }


        if(isset($data['cover_picture'])) {
            // $cover_imageName = rand(1,10).$data['cover_picture']->getClientOriginalName();
            // $imagePath = $data['cover_picture']->move('assets/images', $cover_imageName);
            $cover_imageName = Session::get('image_name');
        } else {
            $cover_imageName = null;
        }

*/
        if(isset($data['networks'])) {



     $Influencer_networks = implode(",", $data['networks']);

$profileLinks = [];

foreach ($data['networks'] as $network) {
    if (!empty($data[$network])) {
        $profileLinks[] = $data[$network];
    }
}

$Influencer_networks_profile_links = implode(",", $profileLinks);


        } else {
            $Influencer_networks = null;
            $Influencer_networks_profile_links = null;
        }

        $username = $data['Choose_username_or_URL'];
        $username = trim($username);
        $username = str_replace(" ","_",$username);



        $redirectTo = '/user';



        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'accepted_terms_and_conditions' => $data['termsCheckbox'],
            'password' => Hash::make($data['password']),
            'role' => $data['role'],
//            'surname' => $data['surname'],
//            'nationality' => $data['nationality'],
//            'bank_account' => $data['bank_account'],
//            'paypal_account' => $data['paypal_account'],
            // 'price_of_subscription' => $data['price_of_subscription'],
            'profile_picture' => $profile_imageName,
            'cover_picture' => $cover_imageName,
            'username_URL' => $username,
            'Influencer_networks' => $Influencer_networks,
            'Influencer_networks_profile_links' => $Influencer_networks_profile_links,
            // 'username_URL' => $data['Choose_username_or_URL'],
//            'instagram_link' => $data['instagram_link'],
        ]);






        } else {

            if(isset($data['other_user_username'])) {
                Session::put('other_user_username', $data['other_user_username']);
            } else {
                // We cannot do anything there
            }



if (Session::has('profile_image_name')) {
    $profile_imageName = Session::get('profile_image_name');
} else {
    $profile_imageName = null;
}

if (Session::has('cover_image_name')) {
    $cover_imageName = Session::get('cover_image_name');
} else {
    $cover_imageName = null;
}



   /**         if(isset($data['profile_picture'])) {
                // $profile_imageName = rand(1,10).$data['profile_picture']->getClientOriginalName();
                // $imagePath = $data['profile_picture']->move('assets/images', $profile_imageName);
                $profile_imageName = Session::get('image_name');
            } else {
                $profile_imageName = null;
            }


            if(isset($data['cover_picture'])) {
                // $cover_imageName = rand(1,10).$data['cover_picture']->getClientOriginalName();
                // $imagePath = $data['cover_picture']->move('assets/images', $cover_imageName);
                $cover_imageName = Session::get('image_name');
            } else {
                $cover_imageName = null;
            }  **/

            if(isset($data['networks'])) {



                $Influencer_networks = implode(",", $data['networks']);

$profileLinks = [];

foreach ($data['networks'] as $network) {
    if (!empty($data[$network])) {
        $profileLinks[] = $data[$network];
    }
}

$Influencer_networks_profile_links = implode(",", $profileLinks);


        } else {
            $Influencer_networks = null;
            $Influencer_networks_profile_links = null;
        }

        $username = $data['Choose_username_or_URL'];
        $username = trim($username);
        $username = str_replace(" ","_",$username);


            $redirectTo = '/influencer';
            // if($data['role'] == 'influencer') {
            //      $redirectTo = '/influencer';
            // }

            // return

              $user =  User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'number' => $data['number'],
                'password' => Hash::make($data['password']),
                'role' => $data['role'],
//                'surname' => $data['surname'],
//                'nationality' => $data['nationality'],
//                'bank_account' => $data['bank_account'],
//                'paypal_account' => $data['paypal_account'],
                'price_of_subscription' => $data['price_of_subscription'],
                'profile_picture' => $profile_imageName,
                'cover_picture' => $cover_imageName,
                'Influencer_networks' => $Influencer_networks,
                'Influencer_networks_profile_links' => $Influencer_networks_profile_links,
                'username_URL' => $username,
                'referred_influencer'  => $data['referred_influencer'],
//                'instagram_link' => $data['instagram_link'],
            ]);

if ($user->role === 'influencer') {
    Stripe::setApiKey(env('STRIPE_SECRET'));

    // Create Stripe Product
    $stripeProduct = StripeProduct::create([
        'name' => $user->name . ' Subscription',
        'description' => 'Subscription for ' . $user->name,
    ]);

    // Create Price for that product
    $stripePrice = StripePrice::create([
        'unit_amount' => round($user->price_of_subscription * 100),
        'currency' => 'usd',
        'recurring' => ['interval' => 'month'],
        'product' => $stripeProduct->id,
    ]);

    // Save in DB
    Product::create([
        'influencer_id' => $user->id,
        'external_product_id' => $stripeProduct->id,
        'external_price_id' => $stripePrice->id,
    ]);
}


 return $user;




        }









    }
}
