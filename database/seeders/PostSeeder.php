<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {    

        
            //creo un nuovo oggetto che conterrà le info delle mie nuove righe
            //per ora lo lascio cosi finchè non avrò collegato il tutto ad un file contenente gli array  
            $newPost = new Post();
    
            $newPost->Nome = 'andy';
            $newPost->Descrizione = 'first description' ;
            $newPost->Immagine_di_copertina = ' ';
            $newPost->Link_repo_GitHub= '' ;
            
    
            //questo ci serve per salvare i campi e applicare e modifiche
            $newPost->save();
            


    }
}
