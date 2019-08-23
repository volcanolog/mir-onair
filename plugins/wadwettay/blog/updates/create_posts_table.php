<?php namespace Wadwettay\Blog\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreatePostsTable extends Migration
{
    public function up()
    {
        Schema::create('wadwettay_blog_posts', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('wadwettay_blog_posts');
    }
}
