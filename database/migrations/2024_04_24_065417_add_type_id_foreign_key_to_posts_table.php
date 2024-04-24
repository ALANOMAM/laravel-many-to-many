<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('posts', function (Blueprint $table) {
             //è qui che si crea il collegamento tra la tabella posts e types 
            //per mezzo del type_id
            //il "contrained()" obbliga il database (e laravel) a vereficare che ogni elemento inserito
            //in quella colonna abbia l'id crrispettivo nella tabella collegata. 
            $table->foreignId('type_id')->nullable()->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            //prima si rimuove il vincolo appicato o chiave esterna
            //la sintassi della stringa dentro le parentesi deve essere
            //"tabella_campo_foreign"
            $table->dropForeign('posts_type_id_foreign');

            //poi dobbiamo cancellare la colonna
            $table->dropColumn('type_id');
        });
    }
};

