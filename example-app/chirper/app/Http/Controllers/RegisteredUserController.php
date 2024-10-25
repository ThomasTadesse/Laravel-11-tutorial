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
       $validatedAttributes = request()->validate([
           'first_name'         => ['required'],
            'last_name'         => ['required'],
            'email'             => ['required', 'email'],   // email_confirmation
            'password'          => ['required', Password::min(8), 'confirmed'],  // password_confirmation
       ]);

         dd($validatedAttributes);

       // create user
    //    User::create([
    //        'first_name' => request('first_name'),
    //        'last_name' => request('last_name'),
    //        'email' => request('email'),
    //        'password' => Hash::make(request('password')),
    //    ]);

       // log in

       // redirect somewhere
    }
}
