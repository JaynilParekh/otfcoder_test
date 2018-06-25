<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Image;
Use File;
use App\Notifications\UserRegistrationConfirmationMail;

class UserController extends Controller
{
    //

	public function index(){

		$users = User::all();

		return view('users.index',compact('users'));
	}

    public function create(){
        return view('users.create');
    }

    public function store(Request $request){

        $this->validate($request, [
            'name'           => 'required|max:500',
            'email'          => 'required|max:500|unique:users',
            'phone_number'   => 'required',
            'password'       => 'required|string|min:6|confirmed',
            'profile_image'  => 'mimes:jpg,jpeg,png,gif',       
            ]);

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

        return redirect()->route('users.index');

    }

    public function show($userId){

        $user = User::findOrFail($userId);

        return view('users.show',compact('user'));

    }

    public function edit($userId){

       $user = User::findOrFail($userId);

       return view('users.edit',compact('user'));

   }

   public function update($userId,Request $request){

       $this->validate($request, [
        'name'           => 'required|max:500',
        'email'          => 'required|max:500',
        'phone_number'   => 'required',
        'profile_image'  => 'mimes:jpg,jpeg,png,gif',       
        ]);

       $user = User::findOrFail($userId);

       $user->name = $request->name;

       $user->email = $request->email;

       $user->phone_number = $request->phone_number;

       if($request->hasFile('profile_image'))
       {

        if($user->profile_picture != NULL)
            File::delete(public_path('uploads/'.$user->avatar_url));

        $photoId = str_random(50).'.'.$request->file('profile_image')->getClientOriginalExtension();
        Image::make($request->file('profile_image'))->save(public_path('uploads/'.$photoId));

        $user->profile_picture = $photo_id;
    }

    $user->save();

    return redirect()->route('users.index');

}

public function destroy($userId){

    $user = User::findOrFail($userId);
    
    if($user->profile_picture != NULL)
        File::delete(public_path('uploads/'.$user->avatar_url));

    $user->delete();

    return redirect()->back();
    
}

}
