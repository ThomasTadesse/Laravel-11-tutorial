<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function  store()
    {
       // validate
       request()->validate([
           'first_name'         => ['required'],
            'last_name'         => ['required'],
            'email'             => ['required', 'email'],   // email_confirmation
            'password'          => ['required', Password::min(8), 'confirmed'],  // password_confirmation
       ]);

       // create user
       

       // log in

       // redirect somewhere
    }
}
