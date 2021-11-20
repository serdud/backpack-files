<?php

namespace Serdud\BackpackFiles;

use Illuminate\Support\ServiceProvider;

class BackpackFilesServiceProvider extends ServiceProvider
{
    private string $routeFilePath = '/routes/backpack/files.php';

    public function boot()
    {
        $this->publishes([__DIR__ . '/config/backpack/files.php' => config_path('backpack/files.php')], 'config');
        $this->publishes([__DIR__.'/database/migrations' => database_path('migrations')], 'migrations');
        $this->publishes([__DIR__.'/resources/views' => resource_path('views/vendor/backpack')], 'views');
        $this->mergeConfigFrom(__DIR__ . '/config/backpack/files.php', 'backpack.files');
        $this->setupRoutes();
    }

    public function register()
    {
        require_once __DIR__.'/helpers.php';
    }

    private function setupRoutes()
    {
        // by default, use the routes file provided in vendor
        $routeFilePathInUse = __DIR__.$this->routeFilePath;

        // but if there's a file with the same name in routes/backpack, use that one
        if (file_exists(base_path().$this->routeFilePath)) {
            $routeFilePathInUse = base_path().$this->routeFilePath;
        }

        $this->loadRoutesFrom($routeFilePathInUse);
    }
}
