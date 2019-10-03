<?php namespace Wadwettay\Banner\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateBannersTable extends Migration
{
    public function up()
    {
        Schema::create('wadwettay_banner_banners', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('link');
            $table->dateTime('date_start');
            $table->dateTime('date_end');
            $table->string('location');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('wadwettay_banner_banners');
    }
}
