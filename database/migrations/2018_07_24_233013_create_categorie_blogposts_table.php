<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategorieBlogpostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categorie_blogposts', function (Blueprint $table) {
            $table->integer('blogpost_id')->unsigned()->index();
            $table->integer('categorie_id')->unsigned()->index();
            $table->foreign('blogpost_id')->references('id')->on('blogposts')->onDelete('cascade');
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
        Schema::dropIfExists('categorie_blogposts');
    }
}
