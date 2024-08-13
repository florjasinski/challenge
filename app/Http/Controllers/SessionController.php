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
            'password' => 'required|min:6',
        ]);

       
        
        if (!auth()->attempt($attributes)) {
            
            return response()->json([
                'success' => false,
                'errors' => [
                    'email' => 'Incorrect email.',
                    'password' => 'Incorrect password.', 
                ]
            ], 401);
        }

        session()->regenerate();

        $user = Auth::user();
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'success' => true,
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);
    }

}




