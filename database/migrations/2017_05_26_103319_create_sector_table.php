<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSectorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sector', function (Blueprint $sector) {
            //tabla sector
            $sector->increments('id');
            $sector->string('name');
            $sector->integer('parish_id')->unsigned();
            $sector->foreign('parish_id')->references('id')->on('parish');
            $sector->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('sector');
    }
}
