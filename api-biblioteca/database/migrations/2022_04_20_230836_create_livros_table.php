<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('livros', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_autor');
            $table->foreign('id_autor')->references('id')->on('autors')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('id_genero');
            $table->foreign('id_genero')->references('id')->on('generos')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('id_editora');
            $table->foreign('id_editora')->references('id')->on('editoras')->onDelete('cascade')->onUpdate('cascade');
            $table->string('titulo', 100);
            $table->integer('ano');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('livros');
    }
};
