<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Src\User\Application\AuthUseCase;
use Src\User\Application\FindUserUseCase;
use Src\User\Domain\contracts\IAuthUseCase;
use Src\User\Domain\contracts\IFindUserUseCase;
use Src\User\Domain\contracts\IUserRepository;
use Src\User\Infrastructure\EloquentUserRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(IUserRepository::class, EloquentUserRepository::class);
        $this->app->bind(IFindUserUseCase::class, FindUserUseCase::class);
        $this->app->bind(IAuthUseCase::class, AuthUseCase::class);
    }
}
