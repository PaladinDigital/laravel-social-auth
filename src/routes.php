<?php

use PaladinDigital\LaravelSocialAuth\Http\Controllers\GoogleController;

Route::group(['middleware' => ['web']], function () {
    // Google
    Route::get('login/google', [GoogleController::class, 'redirectToProvider'])->name('socialauth.login.google');
    Route::get('login/google/callback', [GoogleController::class, 'handleProviderCallback'])->name('socialauth.login.google.callback');

    // Github
    // Route::get('login/github', [GoogleController::class, 'redirectToProvider']);
    // Route::get('login/github/callback', [GoogleController::class, 'handleProviderCallback']);
});
