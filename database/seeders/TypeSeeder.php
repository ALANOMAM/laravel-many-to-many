<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //creao un array per riempire le mie categorie in modo temporaneao, non uso i fakers
        $types = [
            'front-end',
            'back-end',
            'database',
        ];

     foreach($types as $type){
        $newType = new Type();

        $newType->title = $type;
        
        $newType->save();
     }



    }
}
