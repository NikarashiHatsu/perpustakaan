<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        try {
            new \Imagick(public_path() . '/tester/sample.pdf[0]');
        } catch (\Throwable $th) {
            if(strpos($th, 'PDFDelegateFailed')) {
                abort(599);
            }
        }
        if (!extension_loaded('imagick') || !extension_loaded('openssl') || !extension_loaded('pdo') ||
            !extension_loaded('mbstring') || !extension_loaded('tokenizer') || !extension_loaded('xml') ||
            !extension_loaded('ctype') || !extension_loaded('json') || !extension_loaded('bcmath')) {
            abort(599);
        }
        
        Schema::defaultStringLength(191);
    }
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
