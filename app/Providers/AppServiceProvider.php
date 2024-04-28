<?php

namespace App\Providers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define("moderate", function (User $user) {
            return $user->username === 'agoher2k2';
        });

        Blade::if('moderate', fn() => (request()->user()?->can('moderate')));

        Gate::define("owner", function (User $user,) {
            return auth()->user()->username === $user->username;
        });

        Blade::if('owner', fn() => (request()->user()?->can('owner')));
    }
}
