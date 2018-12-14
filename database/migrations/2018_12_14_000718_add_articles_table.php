<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title'); //Campo Agregado
            $table->string('content'); //Campo Agregado
            $table->integer('user_id')->unsigned(); //Campo Agregado (Relacion Tabla: 'users')
            $table->integer('category_id')->unsigned(); //Campo Agregado (Relacion Tabla: 'users')

            $table->foreign('user_id')->references('id')  //Relacion Agregada
                ->on('users')
                ->onDelete('cascade');
            $table->foreign('category_id')->references('id') //Relacion Agregada
                ->on('categories')
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
        Schema::drop('articles');
    }
}
