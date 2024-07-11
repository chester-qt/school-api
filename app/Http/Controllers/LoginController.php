<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $request->validate([
           'email' => 'required|string|email',
           'password' => 'required|string'
        ]);

        $credentials = $request->only('email', 'password');

        if(! Auth::attempt($credentials)) {
            return new \Exception('Invalid credentials');
        }

        return response()->json(['user' => Auth::user(), 'token' => Auth::user()->createToken('MyApp')->plainTextToken]);
    }
}
