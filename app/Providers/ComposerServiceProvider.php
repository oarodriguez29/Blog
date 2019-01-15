<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\view; /* linea agregada para usar el helper 'view' */

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        /* NOTA: En esta Fn 'boot()' se agreagan la vista o vistas donde queremos 
         * que los datos se carguen, sin necesidad de pasarlos por un controlador,
         * con el metodo 'with()', es decir, desde esta Fn 'boot()' se cargan los
         * datos que queremos directamente a la vista que queramos...
         */
                                            // Llamando al 'AsideComposer' en dicha ruta. 
        view()->composer(['front.index', 'front.article'], 'App\Http\ViewComposers\AsideComposer'); 
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
