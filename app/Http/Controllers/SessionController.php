<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class SessionController extends Controller
{
   


    public function create()
    {
        return view('register.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        
        $user = User::create($attributes);

        auth()->login($user);

        return redirect('/contacts');

    }
}