<?php

namespace PaladinDigital\LaravelSocialAuth\Http\Controllers;

use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
        /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('google')->user();

        return $this->loginUser([
            'email' => $user->email,
            'name' => $user->name,
            'avatar' => $user->avatar,
            'password' => $this->generateRandomPassword()
        ]);
    }
}
