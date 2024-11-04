<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store()
    {
        // validate
        $attributes = request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // attempt login
        Auth::attempt($attributes);

        // regenerate session token
        // Happy
        request()->session()->regenerate();

        // redirect
        return redirect('/jobs');
    }

    public function destroy()
    {
        Auth::logout();

        return redirect('/home');
    }
}
