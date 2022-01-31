<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

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

    // STEP épisode 5 utilisation du model tasks pour écupérer toutes les tasks
    public function all()
    {
      // récupération des tasks en BDD
      $tasks = Task::all();
      return response()->json($tasks, 200);

    }

    // STEP épisode 5 utilisation du model tasks pour écupérer une task grace à son id
    public function item($id) {
      // récupération des informations de la task demandée. $TaskId est un paramètre ayant été passé dans l'url
      $taskById = Task::find($id);
      if($taskById) {
          return response()->json($taskById, 200);
        }
      else{return response()->json(['error' => 'Unauthorized'], 500);}
    }

    public function create(Request $request)
    {
        $tasks = new Task;

        $tasks->title = $request->input('title');
        $tasks->status = $request->input('status');
        $tasks->completion = $request->input('completion');
        $tasks->category_id = $request->input('categoryId');
        $tasks->save();

        if ($tasks) {
            return response()->json($tasks, 201);
        } else {
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }


    //



    //

    /**
         * HTTP Method : PUT
         * URL : /tasks/{id}
         */
        public function completeUpdate(Request $request, $id)
        {
            // Pour mettre à jour COMPLETEMENT une tache :
            // 1 - On recup la tache à mettre à jour
            $tasktoupdate = Task::find($id);
            //verify all fields are filled and not empty
            //if not execute the funtion
            if ($request->filled(['title','status','completion', 'categoryId' ])) {
                $tasktoupdate->title = $request->input('title');
                $tasktoupdate->status = $request->input('status');
                $tasktoupdate->completion = $request->input('completion');
                $tasktoupdate->category_id = $request->input('categoryId');
                $tasktoupdate->save();

                if ($tasktoupdate) {
                    return response()->json($tasktoupdate, 201);
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
         * URL : /tasks/{id}
         */
        public function partialUpdate(Request $request, $id)
        {
            // Pour mettre à jour PARTIELLEMENT une tache :
            // 1 - On recup la tache à mettre à jour
            $tasktoupdate = Task::find($id);

            if ($request->has('title')) {
                $tasktoupdate->title = $request->input('title');
            }
            if ($request->has('status')) {
                $tasktoupdate->status = $request->input('status');
            }
            if ($request->has('completion')) {
                $tasktoupdate->completion = $request->input('completion');
            }
            if ($request->has('categoryId')) {
                $tasktoupdate->category_id = $request->input('categoryId');
            }

            $tasktoupdate->save();

            if ($tasktoupdate) {
                return response()->json($tasktoupdate, 201);
            } else {
                return response()->json(['error' => 'Internal Server Error'], 500);
            }
        }

        /**
         * HTTP Method : DELETE
         * URL : /tasks/{id}
         */
        public function remove($id)
        {
            // Pour supprimer une tache de la DB:
            // 1 - On recup la tache à supprimer
            $tasktodelete = Task::find($id);


            $tasktodelete->delete();
            if ($tasktodelete) {
                return response()->json($tasktodelete, 200);
            } else {
                return response()->json(['error' => 'Internal Server Error'], 500);
            }
        }
}
