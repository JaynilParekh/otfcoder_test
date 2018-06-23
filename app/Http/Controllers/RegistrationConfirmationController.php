<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Session;
use App\Http\Controllers\Controller;

class RegistrationConfirmationController extends Controller
{
    //
    public function index($activation_code){
    	
    	User::where('activation_code',$activation_code)->update(['is_activated' => 1]);

    	
    	Session::flash('success','Congrats! Your Email is verified.You can login now.');
    	return redirect('/login');

    }
}
