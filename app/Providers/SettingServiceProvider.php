<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;

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
        try {
            // Verifica se a conexão com o banco está disponível
            if (DB::connection()->getDatabaseName() && Schema::hasTable('settings')) {
                // Busca as configurações via helper e seta no config
                $setting = \Helper::getSetting();
                config()->set('setting', $setting);
            }
        } catch (\Exception $e) {
            // Ignora erros, por exemplo, quando banco não está disponível no build/deploy
        }
    }
}



/*
<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;

class SettingServiceProvider extends ServiceProvider
{
    
     
     
    public function register(): void
    {
        
    }

    
    
     
    public function boot(): void
    {
        
        if (App::runningInConsole()) {
            return;
        }

        try {
            if (DB::connection()->getDatabaseName() && Schema::hasTable('settings')) {
                $setting = \Helper::getSetting();
                config()->set('setting', $setting);
            }
        } catch (\Exception $e) {
           
        }
    }
}  
 */



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


