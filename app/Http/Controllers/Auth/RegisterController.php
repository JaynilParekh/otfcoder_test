<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use App\Notifications\UserRegistrationConfirmationMail;
use Image;
use File;

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

    // use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    // protected function create(array $data)
    // {
    //     return User::create([
    //         'name' => $data['name'],
    //         'email' => $data['email'],
    //         'password' => bcrypt($data['password']),
    //     ]);
    // }

    public function showRegistrationForm()
    {
        
        return view('auth.register');
    }

    public function register(Request $request){

        // $this->validator($request->all())->validate();

         if($request->hasFile('profile_image'))
        {

            $photoId = str_random(50).'.'.$request->file('profile_image')->getClientOriginalExtension();
            Image::make($request->file('profile_image'))->save(public_path('uploads/'.$photoId));
            
            $photo_id = $photoId;
            
        }

        $user = User::create([
                'name'                  => $request->name,
                'email'                 => $request->email,
                'password'              => bcrypt($request->password),
                'phone_number'          => $request->phone_number,
                'profile_picture'       => $photo_id,
                'is_activated'          => 0,
                'activation_code'     => str_random(20),
                ]);

        $user->notify(new UserRegistrationConfirmationMail($user));
        $data = array();
        $data['status'] = 'success';
        $data['message'] = 'Registration success';
        return response()->json($data);
        return redirect('/login');

    }
}
