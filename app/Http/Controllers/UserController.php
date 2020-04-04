<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller{

  public function register(){
    return view('user.register');
  }

  public function userControl(Request $request){
    $validatedData = $request->validate([
      'email' => 'required|unique:user|max:255',
      'password' => 'required'
    ]);

  }

}
