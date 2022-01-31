<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get(
    '/',
    [
        'uses' => 'MainController@home',
        'as'   => 'main-home'
    ]
);

// ===========================================================
// Routes pour la gestion des catégories
// ===========================================================

// récupération de toutes les catégories
$router->get(
    '/categories',
    [
        'uses' => 'CategoryController@all',
        'as'   => 'category-all'
    ]
);

// récupération d'une catégorie spécifique
$router->get(
    '/categories/{id}',
    [
        'uses' => 'CategoryController@item',
        'as'   => 'category-item'
    ]
);



$router->post(
    '/categories',
    [
        'uses' => 'CategoryController@create',
        'as'   => 'category-create'
    ]
);
// update complète d'une categorie
$router->put(
    '/categories/{id}',
    [
        'uses' => 'CategoryController@completeUpdate',
        'as' => 'category-complete-update'
    ]
);

// update partielle d'une categorie
$router->patch(
    '/categories/{id}',
    [
        'uses' => 'CategoryController@partialUpdate',
        'as' => 'category-partial-update'
    ]
);

// Supression d'une categorie
$router->delete(
    '/categories/{id}',
    [
        'uses' => 'CategoryController@remove',
        'as' => 'category-remove'
    ]
);




// ===========================================================
// ===========================================================
// Routes pour la gestion des tasks
// ===========================================================

// récupération de toutes les tasks
$router->get(
    '/tasks',
    [
        'uses' => 'TaskController@all',
        'as'   => 'task-all'
    ]
);

// récupération d'une tache spécifique
$router->get(
    '/tasks/{id}',
    [
        'uses' => 'TaskController@item',
        'as'   => 'task-item'
    ]
);



$router->post(
    '/tasks',
    [
        'uses' => 'TaskController@create',
        'as'   => 'task-create'
    ]
);




// ===========================================================

// update complète d'une tache
$router->put(
    '/tasks/{id}',
    [
        'uses' => 'TaskController@completeUpdate',
        'as' => 'task-complete-update'
    ]
);

// update partielle d'une tache
$router->patch(
    '/tasks/{id}',
    [
        'uses' => 'TaskController@partialUpdate',
        'as' => 'task-partial-update'
    ]
);

// Supression d'une tache
$router->delete(
    '/tasks/{id}',
    [
        'uses' => 'TaskController@remove',
        'as' => 'task-remove'
    ]
);



