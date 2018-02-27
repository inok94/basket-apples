<?php

namespace App\Providers;

use App\Http\Controllers\ApplesController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('apples.repo', function () {
            return new ApplesController();
        });
        $this->app->singleton('users.repo', function () {
            return new UsersController();
        });
    }
}
