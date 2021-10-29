<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class ProPostsCreateFavoritePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('favorite_posts', function (Blueprint $table) {
            $table->id();
            $table->integer('post_id')->unsigned()->references('id')->on('posts')->onDelete('cascade');
            $table->integer('user_id')->unsigned()->references('id')->on('members')->onDelete('cascade');
            $table->enum('type', ['favorite', 'bookmark']);
            $table->unique(['post_id', 'user_id', 'type']);
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
        Schema::dropIfExists('favorite_posts');
    }
}
