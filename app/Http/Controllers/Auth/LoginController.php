<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use App\Models\Cart;
use Session;
use App\Models\User;

use Auth;
use App\Models\Followership;





class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

     use AuthenticatesUsers;


protected function validateLogin(\Illuminate\Http\Request $request)
{
    $user = \App\Models\User::where('email', $request->email)->first();

    if ($user) {
        if ($user->status === 'suspended') {
            abort(redirect()->back()->withInput()->withErrors([
                'email' => '⚠️ Your account has been suspended for violation of the rules of Superfans World. Contact our Support Team. ',
            ]));
        }

        if ($user->status === 'deleted') {
            abort(redirect()->back()->withInput()->withErrors([
                'email' => 'Your account has been deleted permanently.',
            ]));
        }
    }

    $request->validate([
        $this->username() => 'required|string',
        'password' => 'required|string',
    ]);
}

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;

    


    protected function redirectTo() {
        
        if(Session::has('user_id'))
        {
            
            $id = Auth::id();
            $dummy_id = Session::get('user_id');
            
            $Cart_pros = Cart::all();
            // dd($Cart_pros);

            foreach($Cart_pros as $Cart_pro){
                 
                if($Cart_pro->user_id == $dummy_id)
                {
                    // dd($Cart_pro->user_id);   
                    $Cart_product = Cart::find($Cart_pro->id);
                    
                    $Cart_product->user_id = Auth::id();
                    $Cart_product->save();


                }

            }

            $User = User::find(Session::get('user_id'));
            $User->delete();
            Session::forget('user_id');

        }




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

                if(Auth::user()->username_URL !== $other_user_username) {
                    Session::put('subscribe_this_influencer', 'subscribe_this_influencer');
                } 

                return '/'.$other_user_username.'';
            }

            
        }






        // if (Auth::user()->role == 'influencer' )
        // {

        //     return '/influencer';

        // } else  {
            
        //     return '/user';
        // }
if (Auth::user()->role == 'business') {
    return '/super-ads';
}

if (Auth::user()->role == 'influencer') {
    return '/influencer';
}

return '/user'; 





    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    
  protected function authenticated(\Illuminate\Http\Request $request, $user)
{
    // Clear old session data
    Session::forget('profile_image_name');
    // Session::forget('cover_image_name');

    // --- Add referral modal session flash ---
    Session::flash('show_referral_modal', true); 
    Session::flash('referral_username_url', $user->username_URL); 

}

    
    


}
