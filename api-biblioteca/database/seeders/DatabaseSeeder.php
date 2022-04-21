<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //Disabilita as chaves estrangeiras para dar o truncate sem problemas.
        Schema::disableForeignKeyConstraints();

        DB::table('autors')->truncate();
        DB::table('editoras')->truncate();
        DB::table('generos')->truncate();
        DB::table('livros')->truncate();


        //Cria dados fakes
        \App\Models\Genero::factory(5)->create();
        \App\Models\Editora::factory(5)->create();
        \App\Models\Autor::factory(5)->create();
        \App\Models\Livro::factory(6)->create();


        Schema::enableForeignKeyConstraints();
    }
}
