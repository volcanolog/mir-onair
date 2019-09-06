<?php namespace Wadwettay\Trinsling\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateStreamsTable extends Migration
{
    public function up()
    {
        Schema::create('wadwettay_trinsling_streams', function(Blueprint $table) {
            Schema::dropIfExists('wadwettay_trinsling_streams');
            $table->engine = 'InnoDB';
            $table->increments('id');

            $table->string('title');
            $table->string('src');
            $table->string('src_for_apple');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('wadwettay_trinsling_streams');
    }
}
