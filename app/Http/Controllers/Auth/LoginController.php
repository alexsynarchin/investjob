<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Models\User;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'login' => ['required'],
            'password' => ['required'],
        ]);
        if($user = User::where('login', $request->get('login'))->first()) {
            if ($this->checkBitrixPassword($user->deprecated_password, $request->get('password'))) {
                $user->password = bcrypt($request->get('password'));
                $user->deprecated_password = null;
                $user->save();
            }
        }
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return route('dashboard.index');
            //return redirect()->intended('dashboard');
        }

        throw ValidationException::withMessages([
            'login' => [trans('auth.failed')],
        ]);
    }
    public function checkBitrixPassword($deprecated_password, $current_password)
    {
        $db_password = substr($deprecated_password, -32);
        $salt = substr($deprecated_password, 0, strlen($deprecated_password) - 32);
        $user_password = md5($salt.$current_password);

        return $db_password === $user_password;
    }
    public function logout()
    {
        Auth::logout();
        return route('home');
    }
}
