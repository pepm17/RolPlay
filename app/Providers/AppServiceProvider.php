<?php

namespace App\Providers;

use Src\User\Domain\Contracts\UserRepository;
use Src\User\Infrastructure\EloquentUserRepository;
use Src\Shared\Domain\CommandBus;
use Src\Shared\Domain\Container;
use Src\Shared\Domain\Inflector;
use Src\Shared\Infrastructure\InMemoryLaravelCommandBus;
use Src\Shared\Infrastructure\LaravelContainer;
use Src\Shared\Infrastructure\NameInflector;
use Illuminate\Support\ServiceProvider;

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
        $this->app->bind(UserRepository::class, EloquentUserRepository::class);

        $this->app->bind(CommandBus::class, InMemoryLaravelCommandBus::class);
        $this->app->bind(Container::class, LaravelContainer::class);
        $this->app->bind(Inflector::class, NameInflector::class);
    }
}
