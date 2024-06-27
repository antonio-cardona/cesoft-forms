<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Schema;
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
        Schema::defaultStringLength(191);

        Gate::define('any-proyectos', function (User $user) {
            return in_array(
                $user->role,
                ["SUPER", "ADMINISTRADOR"]
            );
        });

        Gate::define('any-users', function (User $user) {
            return in_array(
                $user->role,
                ["SUPER", "ADMINISTRADOR"]
            );
        });

        Gate::define('any-admin', function (User $user) {
            return in_array(
                $user->role,
                ["SUPER", "ADMINISTRADOR"]
            );
        });

        Gate::define('mis-formularios', function (User $user) {
            return in_array(
                $user->role,
                ["SUPER", "ADMINISTRADOR", "INVESTIGADOR", "PARTICIPANTE"]
            );
        });

        Gate::define('any-super-admin', function (User $user) {
            return in_array(
                $user->role,
                ["SUPER"]
            );
        });
    }
}
