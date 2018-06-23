<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Image;
Use File;

class UserController extends Controller
{
    //

	public function index(){

		$users = User::all();

		return view('user_table',compact('users'));
	}

    public function profile(){

    	$user = Auth::user();

    	return view('profile',compact('user'));

    }

    public function edit(){

    	$user = Auth::user();

    	return view('edit_profile',compact('user'));
    
    }

    public function update(Request $request){

    	$this->validate($request, [
            'name'                     => 'required|max:500',
            'email'              		=> 'required|max:500',
            'phone_number'               => 'required',
            
        ]);

    	 if($request->hasFile('profile_image'))
        {

            $photoId = str_random(50).'.'.$request->file('profile_image')->getClientOriginalExtension();
            Image::make($request->file('profile_image'))->save(public_path('uploads/'.$photoId));
            
            $photo_id = $photoId;
            
        }
        else{
        	$photo_id = Auth::user()->profile_picture;
        }

    	$user = Auth::user();

    	$user->name = $request->name;
    	$user->email = $request->email;
    	$user->phone_number = $request->phone_number;
    	$user->profile_picture = $photo_id;

    	$user->save();

    	return redirect()->route('user.profile');

    }
}
