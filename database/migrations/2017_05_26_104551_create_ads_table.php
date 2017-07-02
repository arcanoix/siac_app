<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads', function (Blueprint $ads) {
            //tabla ads
            $ads->increments('id');
            $ads->string('name', 25);
            $ads->string('type_ads');
            $ads->string('cc', 45);
            $ads->string('cl', 45);
            $ads->string('pc', 45);
            $ads->string('pl', 45);
            $ads->string('address', 255);

            $ads->integer('sleeve_id')->unsigned();
            $ads->foreign('sleeve_id')->references('id')->on('sleeve');
            $ads->integer('state_id')->unsigned();
            $ads->foreign('state_id')->references('id')->on('state');
            $ads->integer('municipality_id')->unsigned();
            $ads->foreign('municipality_id')->references('id')->on('municipality');
            $ads->integer('parish_id')->unsigned();
            $ads->foreign('parish_id')->references('id')->on('parish');
            $ads->integer('sector_id')->unsigned();
            $ads->foreign('sector_id')->references('id')->on('sector');

            $ads->string('coord_x');
            $ads->string('coord_y');
            $ads->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('ads');
    }
}
