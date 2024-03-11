<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;  
use App\Models\balance_of_business;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (env('APP_ENV') !== 'local'){
			URL::forceScheme('htpps');
			
		}
		
		
		
		view()->composer('*', function ($view) {
            $balance = balance_of_business::first();
			 $view->with('balance',$balance );

        });
		
	
		
    }
}
