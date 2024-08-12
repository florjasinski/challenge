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

    public function store(Request $request)
{
    $attributes = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (! auth()->attempt($attributes)) {
        return redirect()->back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    session()->regenerate();


    $user = Auth::user();
    $token = $user->createToken('auth_token')->plainTextToken;

    
    if ($request->expectsJson()) {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
            'message' => 'Login successful',
        ]);
    }

    return redirect('/api/contacts');
}

}





