<?php namespace Wadwettay\Blog\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateLatestNewsTable extends Migration
{
    public function up()
    {
        Schema::create('wadwettay_blog_latest_news', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->integer('id');
            $table->string('title');
            $table->string('description');
            $table->integer('image_id');
            $table->boolean('has_video')->default(false);
        });
    }

    public function down()
    {
        Schema::dropIfExists('wadwettay_blog_latest_news');
    }
}
