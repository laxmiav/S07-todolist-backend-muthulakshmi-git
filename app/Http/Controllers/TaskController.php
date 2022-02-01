<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;

class TaskController extends CoreController
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
        $categories = Task::all();
        return $categories;
    }

    // STEP épisode 5 utilisation du model Categories pour écupérer une catégorie grace à son id
    public function item($id)
    {
        // récupération des informations de la catégorie demandée. $taskId est un paramètre ayant été passé dans l'url
        $taskById = Task::find($id);
        if ($taskById) {
            return response()->json($taskById, 200);
        } else {
            // TIPS retourner une réponse vide
            // DOC response https://lumen.laravel.com/docs/5.2/responses
            return new Response('', 404);
        }
    }

    public function create(Request $request)
    {

        // BONUS validation des data avec lumen
        // DOC validation https://laravel.com/docs/8.x/validation
        $validators = [];
        // le titre d'une tache doit unique, ne doit pas être vide, ne doit pas dépasser 128 caractères de long
        $validators['title'] = 'required|unique:tasks|max:128';

        // le status doit avoir comme valeur soit 1, soit 2
        //  $validators['status'] = 'required|integer|numeric|between:1,2'

        $validators['status'] = Rule::in([1,2]);

        // Validation des données envoyées (en post)
        $this->validate($request, $validators);

        // ===========================================================

        $title = $request->input('title');
        $status =  $request->status;
        $completion =  $request->completion;
        $categoryId =  $request->categoryId;

        $task = new Task();
        $task->title = $title;
        $task->completion = $completion;
        $task->status = $status;
        $task->category_id = $categoryId;
        $task->save();

        return response()->json($task, 201);
    }


    public function completeUpdate(Request $request, $id)
    {
        $title = $request->input('title');
        $status =  $request->status;
        $completion =  $request->completion;
        $categoryId =  $request->categoryId;

        $task = Task::find($id);
        // si la tâche n'a pas été trouvée ; nous répondons avec une réponse vide avec le code 500 (serveur erreur)
        if(!$task) {
            return response('', 500);
        }
        $task->title = $title;
        $task->completion = $completion;
        $task->status = $status;
        $task->category_id = $categoryId;

        $task->save();

        return response()->json($task, 201);
    }

    public function partialUpdate(Request $request, $id)
    {
        $title = $request->input('title');
        $status =  $request->status;
        $completion =  $request->completion;
        $categoryId =  $request->categoryId;

        $task = Task::find($id);
        if($title) {
            $task->title = $title;
        }
        if($request->has('completion')) {
            $task->completion = $completion;
        }
        if($status) {
            $task->status = $status;
        }

        if($categoryId) {
            $task->category_id = $categoryId;
        }

        $task->save();
        return response()->json($task, 201);
    }

    public function remove($id)
    {
        $task = Task::find($id);
        $task->delete();
        return new Response('', 200);
    }
}

