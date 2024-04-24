<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //per il seeder della tabella dei posts
        $this->call([
            PostSeeder::class,
        ]);

        //per i seeder della tabella dei types 
        $this->call([
            TypeSeeder::class,
        ]);
    }
}
