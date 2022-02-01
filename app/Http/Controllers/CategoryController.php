<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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
        return $categories;
    }

    // STEP épisode 5 utilisation du model Categories pour écupérer une catégorie grace à son id
    public function item($id)
    {
        // récupération des informations de la catégorie demandée. $categoryId est un paramètre ayant été passé dans l'url
        $categoryById = Category::find($id);
        if ($categoryById) {
            return response()->json($categoryById, 200);
        } else {
            // TIPS retourner une réponse vide
            // DOC response https://lumen.laravel.com/docs/5.2/responses
            return new Response('', 404);
        }
    }

    // DOC request https://lumen.laravel.com/docs/5.2/requests
    public function create(Request $request)
    {
        // récupération du "name" envoyé en post dans la requête
        // équivalent à $name = filter_inpu(INPUT_POST, 'name')
        $name = $request->input('name');

        // nous pouvons également faire comme ceci
        $status =  $request->status;

        // création d'une nouvelle category
        // DOC insert https://laravel.com/docs/8.x/eloquent#inserts
        $category = new Category();
        $category->name = $name;
        $category->status = $status;

        // sauvegarde la nouvelle catégorie
        $category->save();

        // renvoie du status code 201 : un nouvel élément a été créé (status "created")
        return response()->json($category, 201);
    }


    public function completeUpdate(Request $request, $id)
    {
        // récupération du "name" envoyé en post dans la requête
        // équivalent à $name = filter_inpu(INPUT_POST, 'name')
        $name = $request->input('name');

        // nous pouvons également faire comme ceci
        $status =  $request->status;

        // récupération de la catégorie via son id (l'id est passé dans l'url)
        $category = Category::find($id);
        $category->name = $name;
        $category->status = $status;

        // sauvegarde la nouvelle catégorie
        $category->save();

        // renvoie du status code 201 : un nouvel élément a été créé (status "created")
        return response()->json($category, 201);
    }

    public function partialUpdate(Request $request, $id)
    {
        $name = $request->input('name');
        $status =  $request->status;

        $category = Category::find($id);

        // on met à jour le name si une variable name a été envoyée dans la requête (et n'est pas vide)
        if($name) {
            $category->name = $name;
        }
        // on met jour le status si une variable status été envoyée (et n'est pas vide)
        if($status) {
            $category->status = $status;
        }
        $category->save();
        return response()->json($category, 201);
    }

    public function remove($id)
    {
        $category = Category::find($id);
        $category->delete();
        return new Response('', 200);
    }
}

