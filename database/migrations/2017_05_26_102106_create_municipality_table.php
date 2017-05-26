<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMunicipalityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('municipality', function (Blueprint $mun) {
          //tabla municipio
            $mun->increments('id');
            $mun->string('name');
            $mun->integer('state_id')->unsigned();
            $mun->foreign('state_id')->references('id')->on('state');
            $mun->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('municipality');
    }
}
