<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostImage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_image', function (Blueprint $table) {
            //
            $table->increments('id');
            $table->integer('post_id')->unsigned();
            $table->index('post_id');
            $table->string('image');
            $table->timestamps();
        });
        Schema::table('post_image',function (Blueprint $table)
        {
           $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('post_image',function (Blueprint $table)
        {
           $table->dropForeign('post_id');
        });
        Schema::table('post_image', function (Blueprint $table) {
            $table->drop('post_image');
        });
    }
}
