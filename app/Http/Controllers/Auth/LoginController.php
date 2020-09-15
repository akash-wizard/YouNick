<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;
use App\User;
use Str;
use Auth;
use Hash;

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

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function github()
    {
        return Socialite::driver('github')->redirect();
    }
    public function facebook()
    {
        return Socialite::driver('facebook')->redirect();
    }
    public function gmail()
    {
        // dd(1);
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function githubRedirect()
    {
        $user = Socialite::driver('github')->user();

        // dd($user->user);

        $user = User::firstOrCreate([
            'email' => $user->email
        ],[
            'name' => $user->name,
            'password' => Hash::make(Str::random(24)),
            'user_type' =>  'user'
        
        ]);
        // dd(1);
        // $data = new User();
        // $data->email = $user->user['email'];
        // $data->name = $user->user['name'];
        // $data->password = Hash::make(Str::random(24));
        // $data->save();
        // dd(1);

        Auth::login($user, true);
        return redirect()->to( url('/'));
        // $user->token;
    }
    public function facebookRedirect()
    {
        $user = Socialite::driver('facebook')->user();

        dd($user->user);

        $user = User::firstOrCreate([
            'email' => $user->email
        ],[
            'name' => $user->name,
            'password' => Hash::make(Str::random(24)),
            'user_type' =>  'user'
        
        ]);
        // dd(1);
        // $data = new User();
        // $data->email = $user->user['email'];
        // $data->name = $user->user['name'];
        // $data->password = Hash::make(Str::random(24));
        // $data->save();
        // dd(1);

        Auth::login($user, true);
        return redirect()->to( url('/'));
        // $user->token;
    }

    public function gmailRedirect()
    {
        $user = Socialite::driver('google')->user();

        // dd($user->user);

        $user = User::firstOrCreate([
            'email' => $user->email
        ],[
            'name' => $user->name,
            'password' => Hash::make(Str::random(24)),
            'user_type' =>  'user'
        
        ]);
        // dd(1);
        // $data = new User();
        // $data->email = $user->user['email'];
        // $data->name = $user->user['name'];
        // $data->password = Hash::make(Str::random(24));
        // $data->save();
        // dd(1);

        Auth::login($user, true);
        return redirect()->to( url('/'));
        // $user->token;
    }
}
