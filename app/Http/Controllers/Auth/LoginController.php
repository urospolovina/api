<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{

    public function selja(Request $request)
    {
      $request->validate([
        'email' => ['required', 'email'],
        'password' => 'required'
      ]);
  
      $credentials = $request->only('email', 'password');
      
      if (Auth::attempt($credentials)) {
        // return response()->json(Auth::user(), 200);
        return Auth::user();
      }
  
      throw ValidationException::withMessages([
        'email' => 'The provided credentails are incorect.'
      ]);
  
    }
}
