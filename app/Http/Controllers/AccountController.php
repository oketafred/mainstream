<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cartalyst\Sentinel\Checkpoints\ThrottlingException;
use Cartalyst\Sentinel\Checkpoints\NotActivatedException;
use Sentinel;
use Session;
use Validator;

class AccountController extends Controller
{
  public function getLogin(){

    return view("login");

}

public function processLogin(Request $request){

  try{

    $validator = Validator::make($request->all(), [
        'email' => 'required|email',
        'password' => 'required'
    ]);

    if ($validator->fails()) {

        Session::flash('error', 'All Fields are Required!');

        return redirect()->back();
    }

    if (Sentinel::authenticate($request->all())) {
     $slug = Sentinel::getUser()->roles()->first()->slug;

     if ($slug == "admin") {
         return redirect()->route('admin_dashboard');
     }elseif ($slug == "clinican") {
         return redirect()->route('patients');
     }elseif ($slug == "vendor") {
      return redirect()->route('vendor-dashboard');
  }
}else{

    Session::flash('error', 'Wrong Credentials!');

    return redirect()->back();

}

}catch(ThrottlingException $ex){
    $delay = $ex->getDelay()/60;

    Session::flash('error', "You have been locked out. For $delay");

    return redirect()->back();

}catch(NotActivatedException $ex){

    Session::flash('error', 'You account is not activated! Please check your Email');

    return redirect()->back();

}

}


public function logout(){
    Sentinel::logout();

    return redirect('/');
}



}
