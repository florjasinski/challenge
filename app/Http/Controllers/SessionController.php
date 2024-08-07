<?php

namespace App\Http\Controllers;
use App\Models\User;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class SessionController extends Controller
{
   


    public function create()
    {
        return view('auth.create');
    }

    public function store()
{
    
    
    $attributes = [
        'email' => request('email'),
        'password' => request('password'),
    ];


    if (! auth()->attempt($attributes)) {
        return redirect()->back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]); 
    }

    session()->regenerate();


    return redirect()->intended('/contacts');
}
}

