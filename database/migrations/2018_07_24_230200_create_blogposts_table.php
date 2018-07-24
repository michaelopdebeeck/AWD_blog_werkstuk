<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogpostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogposts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 256);
            $table->string('subtitle', 100);
            $table->string('slug', 100);
            $table->text('body');
            $table->boolean('status');
            $table->integer('posted_by');
            $table->string('image', 256);
            $table->integer('like');
            $table->integer('dislike');

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
        Schema::dropIfExists('blogposts');
    }
}