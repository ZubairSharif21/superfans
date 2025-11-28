<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


use App\Models\Cart;
use App\Models\Influencer_network;
use Session;

use Auth;

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

    protected $redirectTo = '/influencer';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
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
        if(isset($data['profile_picture'])) {
            $profile_imageName = rand(1,10).$data['profile_picture']->getClientOriginalName();
            $imagePath = $data['profile_picture']->move('assets/images', $profile_imageName);
        } else {
            $profile_imageName = null;
        }


        if(isset($data['cover_picture'])) {
            $cover_imageName = rand(1,10).$data['cover_picture']->getClientOriginalName();
            $imagePath = $data['cover_picture']->move('assets/images', $cover_imageName);
        } else {
            $cover_imageName = null;
        }


        if(isset($data['networks'])) {



        $Influencer_networks = implode(",",$data['networks']);

        $Influencer_networks_profile_links = "";
        foreach($data['networks'] as $network) {
            $Influencer_networks_profile_links .= $data[$network].",";
        }
        
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
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => $data['role'],
//            'surname' => $data['surname'],
//            'nationality' => $data['nationality'],
            'bank_account' => $data['bank_account'],
            'paypal_account' => $data['paypal_account'],
            'price_of_subscription' => $data['price_of_subscription'],
            'profile_picture' => $profile_imageName,
            'cover_picture' => $cover_imageName,
            'Influencer_networks' => $Influencer_networks,
            'Influencer_networks_profile_links' => $Influencer_networks_profile_links,
            'username_URL' => $username,
//            'instagram_link' => $data['instagram_link'],
        ]);


        // foreach($data['networks'] as $network) {
        //     $Influencer_network = new Influencer_network();
        //     $Influencer_network->user_id = $User->id;
        //     $Influencer_network->network_id = $network;
        //     $Influencer_network->save();

        // }


        

       



    }
}
