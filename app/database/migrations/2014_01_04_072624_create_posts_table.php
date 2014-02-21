<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePostsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('read_more');
            $table->text('content');
            $table->unsignedInteger('comment_count');
            $table->timestamps();
            $table->engine = 'MyISAM';
        });
        DB::statement('ALTER TABLE posts ADD FULLTEXT search(title, content)');
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropIndex('search');
            $table->drop();
        });
    }

}
