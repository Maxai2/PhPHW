<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class TasksServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Abstractions\ITasksService',
            'App\Services\TasksService'
        );
    }
}
