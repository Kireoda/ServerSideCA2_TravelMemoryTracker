<?php

namespace App\Providers;

use Illuminate\Support\Facades\File;
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
        $paths = [
            storage_path('framework/cache'),
            storage_path('framework/cache/data'),
            storage_path('framework/sessions'),
            storage_path('framework/views'),
            base_path('bootstrap/cache'),
            config('view.compiled'),
        ];

        foreach ($paths as $path) {
            if (! $path) {
                continue;
            }

            File::ensureDirectoryExists($path);

            if (! is_writable($path)) {
                @chmod($path, 0777);
            }
        }
    }
}
