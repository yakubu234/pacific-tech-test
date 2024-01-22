<?php

namespace App\Providers;

use App\Interfaces\EmailVerificationRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;
use App\Repositories\EmailVerificationRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(EmailVerificationRepositoryInterface::class, EmailVerificationRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
