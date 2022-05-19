<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    // TIPS "magie" lumen peut deviner le nom de la table au pluriel même si le nom de la classe est au singulier
    // protected $table = 'tasks';

    // STEP episode 6 ; une tâche "a une catégorie" (appartient à une catégorie) (relation 1,1)

    public function category()
    {
        return $this->belongsTo(
            Category::class, // la classe a utiliser pour récupérer l 'entité associée
            'category_id',  // le nom de la foreign key dans la bdd
            'id', // la clé primaire à utiliser dans la table category (ici nous ciblons categories.id)
        );
    }
}
