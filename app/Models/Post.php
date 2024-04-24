<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    //il nostro post avrà solo un type(infatti ha un senso se lo metto in singolare)
    public function type(){
       return $this->belongsTo(Type::class);
    }

    //il nostro post sarà collegato a diverse tecnologie (infatti chiamo la funzione al plurale)
    public function technologies() {
        return $this->belongsToMany(Technology::class);
    }
}
