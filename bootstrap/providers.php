<?php

use App\Providers\AppServiceProvider;
use App\Providers\RepositoryServiceProvider;
use Laravel\Socialite\SocialiteServiceProvider;

return [
    AppServiceProvider::class,
    RepositoryServiceProvider::class,
    SocialiteServiceProvider::class,
];
