<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\irepositories\IUser;
use App\repositories\UserRepository;

class userRepositoyProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(IUser::class,UserRepository::class);

    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
