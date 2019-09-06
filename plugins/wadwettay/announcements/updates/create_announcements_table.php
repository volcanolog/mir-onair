<?php namespace Wadwettay\Announcements\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateAnnouncementsTable extends Migration
{
    public function up()
    {
        Schema::create('wadwettay_announcements_announcements', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');

            $table->string('title');
            $table->string('description');
            $table->dateTime('date');
            $table->string('link');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('wadwettay_announcements_announcements');
    }
}
