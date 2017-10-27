<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAutherToPosts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts',function(Blueprint $table)
        {
            $table->integer('author')->unsigned();
            $table->index('author');
        });
        Schema::table('posts',function (Blueprint $table)
        {
           $table->foreign('author')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::table('posts',function (Blueprint $table)
       {
          $table->dropForeign('posts_author_foreign');
       });

       Schema::table('posts',function (Blueprint $table)
       {
          $table->drop('posts');
       });
    }
}
