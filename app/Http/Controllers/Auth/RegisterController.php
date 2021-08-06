<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'email' =>  ['required', 'email']
    ]);
        $user = User::create([
           'login' => $request->get('email'),
            'email' => $request->get('email'),
            'password' => Hash::make(Str::random(8))
        ]);
    }
}
