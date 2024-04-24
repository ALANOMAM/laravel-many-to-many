<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{
    use HasFactory;

    //il nostro technology sarà collegato a diversi posts (infatti chiamo la funzione al plurale anche qui)
    public function posts() {
        return $this->belongsToMany(Post::class);
    }
}
