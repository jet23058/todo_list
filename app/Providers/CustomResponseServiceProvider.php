<?php namespace App\Providers;

use App\Services\CustomResopnseServiceManager;
use Illuminate\Support\ServiceProvider;

class CustomResponseServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->app->make('App\Services\ResponseMacroManager');
    }

    public function register()
    {
        $this->app->singleton('custom-response', function ($data, $message) {
            return new CustomResopnseServiceManager($data, $message);
        });
    }
}
