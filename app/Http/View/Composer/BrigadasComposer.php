<?php

namespace App\Http\View\Composer;

use App\Models\Brigada;

//use Illuminate\Support\Facades\View;
use Illuminate\View\View;

class BrigadasComposer
{
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $brigadaItems = Brigada::pluck('nombre','id')->toArray();
            //dd($brigadaItems);
            //exit(0);
        $view->with('brigadaItems', $brigadaItems);

    }
}