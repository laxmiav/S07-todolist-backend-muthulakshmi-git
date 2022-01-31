<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

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

    // STEP épisode 5 utilisation du model Categories pour écupérer toutes les catégories
    public function all()
    {
        // récupération des categories en BDD
        $categories = Category::all();
        return response()->json($categories, 200);
    }

    // STEP épisode 5 utilisation du model Categories pour écupérer une catégorie grace à son id
    public function item($id)
    {
        // récupération des informations de la catégorie demandée. $categoryId est un paramètre ayant été passé dans l'url
        $categorybyid = Category::find($id);
        if ($categorybyid) {
            return response()->json($categorybyid, 200);
        } else {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }

    public function create(Request $request)
    {
        $categories = new Category;

        $categories->name = $request->input('name');
        $categories->status = $request->input('status');
        $categories->save();

        if ($categories) {
            return response()->json($categories, 201);
        } else {
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }

    //

    /**
         * HTTP Method : PUT
         * URL : /categories/{id}
         */
    public function completeUpdate(Request $request, $id)
    {
        // Pour mettre à jour COMPLETEMENT une catégorie :
        // 1 - On recup la catégorie à mettre à jour
        $category = Category::find($id);
        //verify all fields are filled and not empty
        //if not execute the funtion
        if ($request->filled(['name','status'])) {
            $category->name = $request->input('name');
            $category->status = $request->input('status');
            $category->save();

            if ($category) {
                return response()->json($category, 201);
            } else {
                return response()->json(['error' => 'Internal Server Error'], 500);
            }
        }
        //or send a bad request
        else {
            return response()->json(['error' => 'Bad request'], 400);
        }
    }

    /**
     * HTTP Method : PATCH
     * URL : /categories/{id}
     */
    public function partialUpdate(Request $request, $id)
    {
        // Pour mettre à jour PARTIELLEMENT une catégorie :
        // 1 - On recup la catégorie à mettre à jour
        $category = Category::find($id);

        if ($request->has('name')) {
            $category->name = $request->input('name');
        }
        if ($request->has('status')) {
            $category->status = $request->input('status');
        }

        $category->save();

        if ($category) {
            return response()->json($category, 201);
        } else {
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }

    /**
     * HTTP Method : DELETE
     * URL : /categories/{id}
     */
    public function remove($id)
    {
        // Pour supprimer une catégorie de la DB:
        // 1 - On recup la catégorie à supprimer
        $category = Category::find($id);


        $category->delete();
        if ($category) {
            return response()->json($category, 200);
        } else {
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }
}
