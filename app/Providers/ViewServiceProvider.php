<?php

namespace App\Providers;
use App\Models\Brigada;

use Illuminate\Support\ServiceProvider;
//use View;
use Illuminate\Support\Facades\View;

class ViewServiceProvider extends ServiceProvider
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
        /**
        View::composer(['integrantes.fields'], function ($view) {
            $brigadaItems = Brigada::pluck('nombre','id')->toArray();
            $view->with('brigadaItems', $brigadaItems);
        });
        **/

        View::composers(['App\Http\View\Composer\InstitucionesComposer' => ['usuarios.create', 'usuarios.edit'],
            'App\Http\View\Composer\BrigadasComposer' => ['integrantes.fields'],
        ]);

    }
}