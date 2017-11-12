<?php

namespace App\Providers;

use App\Ad;
use App\Admin;
use App\Column;
use App\Issue;
use App\Magazine;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        View::composer('*', function($view){
            $view->with('columns',Column::all())
                ->with('issues',Issue::all())
                ->with('ads',Ad::all())
                ->with('auth',Auth::user());
        });
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
