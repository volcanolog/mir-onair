<?php namespace Wadwettay\Banner\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class AddTitleBannersTable extends Migration
{
    public function up()
    {
        Schema::table('wadwettay_banner_banners', function (Blueprint $table) {
            $table->string('title');
        });
    }

    public function down()
    {
        Schema::table('wadwettay_banner_banners', function(Blueprint $table) {
            $table->dropColumn('title');
        });
    }
}
