<?php

namespace App\Http\Controllers;

use App\Models\Categories;

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
      // récupération des categories en BDD
      $categories = Categories::all();
      return $categories;
    }

    //
}
