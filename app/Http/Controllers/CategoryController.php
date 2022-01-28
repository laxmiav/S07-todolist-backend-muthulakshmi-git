<?php

namespace App\Http\Controllers;

class CategoryController extends CoreController
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

    public function all()
    {

        $categories = [
            [
              'id' => 1,
              'name' => 'Chemin vers O\'clock',
              'status' => 1
            ],
            [
              'id' => 2,
              'name' => 'Courses',
              'status' => 1
            ],
            [
              'id' => 3,
              'name' => 'O\'clock',
              'status' => 1
            ],
            [
              'id' => 4,
              'name' => 'Titre Professionnel',
              'status' => 1
            ],
            [
              'id' => 5,
              'name' => 'Concevoir de bon jeux web',
              'status' => 1
            ],
          ];

        return $categories;
    }

    //
}
