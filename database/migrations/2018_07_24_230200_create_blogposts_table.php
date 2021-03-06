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
            $table->boolean('status')->nullable();
            $table->string('posted_by')->nullable();
            $table->string('image')->nullable();
            $table->integer('like')->nullable();
            $table->integer('dislike')->nullable();

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
