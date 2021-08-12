<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;
use App\Models\Account\SocialAccount;
use App\Models\User;
use App\Services\Auth\SocialAuth;
use Auth;

class SocialController extends Controller
{
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->scopes(['email'])->redirect();
    }
    public function handleProviderCallback($provider, Request $request)
    {
        if ($provider == 'vkontakte') {
            $socialiteUser = Socialite::driver($provider)->fields([
                'photo',
            ])->user();
            $email = $socialiteUser->accessTokenResponseBody['email'] ?? $socialiteUser->email;
            $socialiteUser->email = $email;
            $socialiteUser -> avatar = $socialiteUser->user['photo'];
        } else {
            $socialiteUser = Socialite::driver($provider)->user();
        }
        //dd($socialiteUser);
        $user = $this->findOrCreateUser($provider, $socialiteUser);

        Auth::login($user, true);
       // dd(Auth::user());
        $request->session()->regenerate();
        return redirect(route('dashboard.index'));
    }
    private function findOrCreateUser($provider, $socialiteUser)
    {
        if ($user = $this->findUserBySocialId($provider, $socialiteUser->getId())) {
            return $user;
        }
        if ($user = $this->findUserByEmail($provider, $socialiteUser->getEmail())) {
            $this->addSocialAccount($provider, $user, $socialiteUser);
            return $user;
        }
        if ($provider =='vkontakte'){
            $user = User::create([
                'name' => $socialiteUser-> user['first_name'],
                'login' => Str::slug($socialiteUser -> user['first_name'] . ' ' . $socialiteUser ->  user['last_name']),
                'surname' => $socialiteUser-> user['last_name'],
                'email' => $socialiteUser->email,
                //'avatar' => $socialiteUser -> avatar,
                'password' => bcrypt(Str::random(25)),
            ]);
        } else {
            $user = User::create([
                'name' => $socialiteUser->name,
                'email' => $socialiteUser->email,
                'avatar' =>'',
                'password' => bcrypt(Str::random(25)),
            ]);
        }
        $this->addSocialAccount($provider, $user, $socialiteUser);
        return $user;
    }
    private function findUserBySocialId($provider, $id)
    {
        $socialAccount = SocialAccount::where('provider', $provider)
            ->where('provider_id', $id)
            ->first();
        return $socialAccount ? $socialAccount->user : false;
    }
    private function findUserByEmail($provider, $email)
    {
        return !$email ? null : User::where('email', $email)->first();
    }
    private function addSocialAccount($provider, $user, $socialiteUser)
    {
        SocialAccount::create([
            'user_id' => $user->id,
            'provider' => $provider,
            'provider_id' => $socialiteUser->getId(),
            'token' => $socialiteUser->token,
        ]);
    }
}
