<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;

class SettingServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Evita tentar acessar o banco durante comandos como package:discover
        if (App::runningInConsole()) {
            return;
        }

        try {
            if (DB::connection()->getDatabaseName() && Schema::hasTable('settings')) {
                $setting = \Helper::getSetting();
                config()->set('setting', $setting);
            }
        } catch (\Exception $e) {
            // Ignora erro de conexão com o banco durante build/deploy
        }
    }
}



// nino

// <?php

// namespace App\Providers;

// use Illuminate\Support\Facades\Schema;
// use Illuminate\Support\ServiceProvider;
// use Illuminate\Support\Facades\DB;

// class SettingServiceProvider extends ServiceProvider
// {
//     /**
//      * Register services.
//      */
//     public function register(): void
//     {
//         //
//     }

//     /**
//      * Bootstrap services.
//      */
//     public function boot(): void
//     {

//         if (DB::connection()->getDatabaseName()) {
//             if (Schema::hasTable('settings')) {
//                 $setting = \Helper::getSetting();
//                 config()->set('setting', $setting);
//             }
//         }
//     }
// } 


