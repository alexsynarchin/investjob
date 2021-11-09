<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Models\User;

class AdminLoginController extends Controller
{
    public function login()
    {
        return view('admin.auth.login');
    }
    public function handleLogin(Request $request)
    {
        $credentials = $request->validate([
            'login' => ['required'],
            'password' => ['required'],
        ]);
        $user = User::where('login', $request->get('login'))->first();
        if (Auth::attempt($credentials) && $user -> hasRole('super-admin')) {
            $request->session()->regenerate();
            return route('admin');
            //return redirect()->intended('dashboard');
        }
        throw ValidationException::withMessages([
            'login' => [trans('auth.failed')],
        ]);
    }
}
