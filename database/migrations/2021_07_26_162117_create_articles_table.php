<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
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
            $table->integer('categorie_id')->unsigned();
            $table->string('name');
            $table->string('price');
            $table->string('old_price');
            $table->string('description');
            $table->string('brand');
            $table->string('weight');
            $table->string('size');
            $table->string('color');
            $table->string('availablity');
            $table->string('ref');
            $table->string('image')->default('0');
            $table->string('imgpath')->default('0');
            $table->timestamps();
            $table->foreign('categorie_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
