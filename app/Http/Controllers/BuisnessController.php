<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Foundation\Auth\RegistersUsers;

use App\Models\User;
use App\Models\Cart;
use App\Models\Followership;
use Session;
use Auth;

class BuisnessController extends Controller
{
    use AuthenticatesUsers, RegistersUsers {
        AuthenticatesUsers::guard insteadof RegistersUsers;
    }

    protected $redirectTo = '/';


    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
public function showRegistrationForm()
{
    return view('auth.business_register');
}
public function showLoginForm()
{
    return view('auth.business_login');
}

    /** ---------------- LOGIN VALIDATION (copied) ------------------- */
protected function validateLogin(Request $request)
{
    $user = User::where('email', $request->email)->first();

    if ($user) {

        // ❌ Block if not a Business account
        if ($user->role !== 'business') {
            return redirect()->back()->withInput()->withErrors([
                'email' => 'This login page is only for business accounts.',
            ]);
        }

        if ($user->status === 'suspended') {
            return redirect()->back()->withInput()->withErrors([
                'email' => '⚠️ Your account has been suspended.',
            ]);
        }

        if ($user->status === 'deleted') {
            return redirect()->back()->withInput()->withErrors([
                'email' => 'Your account has been deleted permanently.',
            ]);
        }

        if ($user->status === 'inactive') {
            return redirect()->back()->withInput()->withErrors([
                'email' => 'Your account has not been approved.',
            ]);
        }
    }

    $request->validate([
        $this->username() => 'required|string',
        'password' => 'required|string',
    ]);
}


    /** ---------------- REDIRECT AFTER LOGIN (copied) --------------- */
    protected function redirectTo()
    {
        // 🛒 Move cart items from guest to real user
        if (Session::has('user_id')) {
            $dummyId = Session::get('user_id');

            Cart::where('user_id', $dummyId)
                ->update(['user_id' => Auth::id()]);

            User::find($dummyId)->delete();
            Session::forget('user_id');
        }

        if (Session::has('other_user_username')) {
            $username = Session::get('other_user_username');
            Session::forget('other_user_username');

            $other = User::where('username_URL', $username)->first();

            if ($other->role == "user") {
                $this->autoFollow($other);
            } else {
                if (Auth::user()->username_URL !== $username) {
                    Session::put('subscribe_this_influencer', true);
                }
            }

            return '/' . $username;
        }

        return '/super-ads';
    }

    private function autoFollow($other)
    {
        $follow = Followership::where('followed_user_id', $other->id)
                ->where('follower_user_id', Auth::id())
                ->first();

        if (!$follow) {
            Followership::create([
                'followed_user_id' => $other->id,
                'follower_user_id' => Auth::id()
            ]);

            $other->increment('no_of_followers');
            Session::put('message_follow', 'Followed Successfully');
        }
    }

    /** ----------------- REGISTRATION VALIDATION (copied) ------------- */
    protected function validator(array $data)
    {
        return \Validator::make($data, [
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);
    }

    /** ----------------- CREATE USER (copied) ------------------------ */
    protected function create(array $data)
    {
        return User::create([
            'name'  => $data['name'],
            'email' => $data['email'],
            'password' => \Hash::make($data['password']),
            'role' => 'business', 
            'status' => 'inactive', 
            
        ]);
        
        
    }

}
