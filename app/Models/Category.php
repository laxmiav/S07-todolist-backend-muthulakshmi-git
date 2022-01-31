<?php
namespace App\Models;


// STEP épisode 5 Eloquent l'équivalent du CoreModel
use Illuminate\Database\Eloquent\Model;


class Category extends Model
{
    // Déclaration du nom de la table sur laquelle la classe Categories va travailler
    // https://laravel.com/docs/8.x/eloquent#table-names
    // si le nom de la classe est le même que le nom de la table ; il n'y a pas besoin de spécifier le nom de la table
    protected $table = 'categories';
}
