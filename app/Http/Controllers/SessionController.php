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
        $credentials = request()->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        dd(Auth::attempt($credentials));

    
        if (Auth::attempt($credentials)) {
            session()->regenerate();
            
            return redirect()->intended('/posts');
        } else {
            return redirect()->intended('/contacts');
        }
    
        
    }
    

}
