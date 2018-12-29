<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });

        // Tabla Pivot (Relacion Muchos a Muchos) / Tablas ('articles & tags').
        Schema::create('article_tag', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('article_id')->unsigned();
            $table->integer('tag_id')->unsigned();

            $table->foreign('article_id')->references('id') // Relacion Agregada.
                ->on('articles')
                ->onDelete('cascade');
            $table->foreign('tag_id')->references('id') // Relacion Agregada.
                ->on('tags')
                ->onDelete('cascade');
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
        Schema::drop('article_tag'); // se debe borrar primero la tabla pivot = (relacion).
        Schema::drop('tags'); // para luego poder borrar los tags asociados.
    }
}
