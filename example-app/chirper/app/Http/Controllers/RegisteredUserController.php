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
            'email'             => ['required', 'email', 'max:254'],
            'email_verified_at' => ['required', 'date'],
            'password'          => ['required'],
            'remember_token'    => ['nullable'],
       ]);

       // create user

       // log in

       // redirect somewhere
    }
}
