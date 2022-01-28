<?php

namespace App\Http\Controllers;
use App\Models\Citation;

class MainController extends CoreController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function home()
    {
        // return '<h1>Hello world</h1>';

        return view(
            'main-home',
            [
                'someone' => 'Loïc'
            ]
        );
    }


    // public function kaamelott()
    // {
    //     $citations = Citation::all();
    //     return $citations;
    // }




}
