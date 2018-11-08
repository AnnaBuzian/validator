<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Entity\Role;
use Laravel\Socialite\Facades\Socialite;
use App\Entity\User;
use App\Entity\SocialAccount;
use Laravel\Socialite\Two\GoogleProvider;

/**
 * Class SocialController
 * @package App\Http\Controllers\Auth
 */
class SocialController extends Controller
{
    /**
     * @param $provider
     * @return mixed
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * @param $provider
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function handleProviderCallback($provider)
    {
        /** @var GoogleProvider $socialiteUser */
        $socialiteUser = Socialite::driver($provider)->user();

        $user = $this->findOrCreateUser($provider, $socialiteUser);

        auth()->login($user, true);

        return redirect('/');
    }


    /**
     * @param $provider
     * @param $socialiteUser
     * @return mixed
     */
    public function findOrCreateUser($provider, $socialiteUser)
    {
        if ($user = $this->findUserBySocialId($provider, $socialiteUser->getId())) {
            return $user;
        }

        if ($user = $this->findUserByEmail($provider, $socialiteUser->getEmail())) {
            $this->addSocialAccount($provider, $user, $socialiteUser);

            return $user;
        }

        /** @var User $user */
        $user = User::create([
            'name' => $socialiteUser->getName(),
            'email' => $socialiteUser->getEmail(),
            'password' => bcrypt(str_random(25)),
        ]);

        $user
            ->roles()
            ->attach(Role::where('name', 'employee')->first());

        $this->addSocialAccount($provider, $user, $socialiteUser);

        return $user;
    }


    /**
     * @param $provider
     * @param $id
     * @return bool
     */
    public function findUserBySocialId($provider, $id)
    {
        $socialAccount = SocialAccount::where('provider', $provider)
            ->where('provider_id', $id)
            ->first();

        return $socialAccount ? $socialAccount->user : false;
    }


    /**
     * @param $provider
     * @param $email
     * @return mixed
     */
    public function findUserByEmail($provider, $email)
    {
        return User::where('email', $email)->first();
    }


    /**
     * @param $provider
     * @param $user
     * @param $socialiteUser
     */
    public function addSocialAccount($provider, $user, $socialiteUser)
    {
        SocialAccount::create([
            'user_id' => $user->id,
            'provider' => $provider,
            'provider_id' => $socialiteUser->id,
            'token' => $socialiteUser->token,
        ]);
    }
}
