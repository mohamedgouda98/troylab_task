<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Http\Interfaces\StudentsInterface',
            'App\Http\Repositories\StudentsRepository'
        );

        $this->app->bind(
            'App\Http\Interfaces\SchoolsInterface',
            'App\Http\Repositories\SchoolsRepository'
        );

        $this->app->bind(
            'App\Http\Interfaces\Api\StudentsApiInterface',
            'App\Http\Repositories\Api\StudentsApiRepository'
        );

        $this->app->bind(
            'App\Http\Interfaces\Api\SchoolsApiInterface',
            'App\Http\Repositories\Api\SchoolsApiRepository'
        );

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
