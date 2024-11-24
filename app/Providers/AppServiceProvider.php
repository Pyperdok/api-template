<?php

namespace App\Providers;

use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;
use Src\Domain\Core\Interfaces\IEmail;
use Src\Domain\Core\Interfaces\IPassword;
use Src\Domain\Core\Interfaces\IUser;
use Src\Infrastructure\EmailProvider;
use Src\Infrastructure\Interfaces\IUserRepository;
use Src\Infrastructure\PasswordProvider;
use Src\Infrastructure\UserProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(IEmail::class, EmailProvider::class);
        $this->app->bind(IUser::class, UserProvider::class);

        $this->app->bind(IUserRepository::class, UserRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
