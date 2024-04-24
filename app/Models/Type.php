<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    //un tipo può avere tanti post collegati
    public function posts(){
        return $this->hasMany(Post::class);
    }
}
