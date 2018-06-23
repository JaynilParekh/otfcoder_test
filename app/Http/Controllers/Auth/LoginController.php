<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\User;
use Auth;

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

    // use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('guest')->except('logout');
    // }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Declare the rules for the form validation
        $this->validate($request, array(
            'email'    => 'required|email',
            'password' => 'required|between:3,32',
            
        ));

        if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password,'is_activated' => 1]))
        {
            $user = User::where('email',$request->email)->first();

            if($user->is_activated == 1){
              return redirect()->route('user.index');  
            }
            else{
                return redirect()->back()->withInput()->withErrors(['Your account is under process']);
            }
        }

        else
        {
            return redirect()->back()->withInput()->withErrors(['Incorrect email or password']);
        }
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    

    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->flush();

        $request->session()->regenerate();

        return redirect('/login');
    }

    protected function guard()
    {
        return Auth::guard();
    }
}
