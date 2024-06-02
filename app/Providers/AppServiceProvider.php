<?php

namespace App\Providers;
use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {

        $loader = AliasLoader::getInstance();
        $loader->alias('Agent', Jenssegers\Agent\Facades\Agent::class);
        $loader->alias('Image', Intervention\Image::class);




    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
