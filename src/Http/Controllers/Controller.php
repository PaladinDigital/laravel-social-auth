<?php

namespace PaladinDigital\LaravelSocialAuth\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;

class Controller extends BaseController
{
    protected function loginUser($user)
    {
        // If user is not already in our users table we need to register them.
        $userModel = $this->getUserModel();

        // Get or create the user matching the email
        $appUser = $userModel::firstOrCreate(
            ['email' => $user['email']],
            $user
        );

        // Log in the user
        Auth::loginUsingId($appUser->id);

        return redirect()->route('app');
    }

    /**
     * Get the user model for the laravel application.
     */
    protected function getUserModel()
    {
        $model = Config::get('auth.providers.users.model');
        if (class_exists($model)) {
            return $model;
        }
        return null;
    }

    /**
     * Generates a random password to be used if user does not already exist.
     * User would not know what this is so they would have to use password reset functionality.
     */
    protected function generateRandomPassword()
    {
        return substr(Str::uuid(), 0, 32);
    }
}
