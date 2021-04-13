<?php

namespace App\Http\View\Composer;
use App\Models\Institucion;

//use Illuminate\Support\Facades\View;
use Illuminate\View\View;

class InstitucionesComposer
{
   
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        //$instituciones = Institucion::all();
        //$view->with('instituciones', $instituciones);

        $institucionItems = Institucion::pluck('nombre','id')->toArray();
            //dd($brigadaItems);
            //exit(0);
        $view->with('institucionItems', $institucionItems);

    }
}