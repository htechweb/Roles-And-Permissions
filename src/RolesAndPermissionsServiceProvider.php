<?php

namespace Htech\RolesAndPermissions;
use Illuminate\Support\ServiceProvider;

class RolesAndPermissionsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // $this->app->make('Htech\Dragonpay\Controllers\DragonpayController');
        $this->mergeConfigFrom(
            __DIR__.'/config/roles-and-permissions.php', 'roles-and-permissions'
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes.php');
        // $this->loadMigrationsFrom(__DIR__.'/migrations');
        // $this->loadViewsFrom(__DIR__.'/views', 'roles-and-permissions');
        $this->publishes([
            __DIR__.'/views'                                        => resource_path('views/htech'),
            __DIR__.'/assets'                                       => public_path('roles-and-permissions'),
            __DIR__.'/migrations'                                   => database_path('seeds'),
            __DIR__.'/Controllers/RolesAndPermissionsController.php'=> app_path('Http/Controllers/RolesAndPermissionsController.php'),
            __DIR__.'/config/roles-and-permissions.php'             => config_path('roles-and-permissions.php'),
        ]);
    }
}
