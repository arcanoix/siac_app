<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParishTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parish', function (Blueprint $parish) {
            //tabla parroquia
            $parish->increments('id');
            $parish->string('name');
            $parish->integer('municipality_id')->unsigned();
            $parish->foreign('municipality_id')->references('id')->on('municipality');
            $parish->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('parish');
    }
}
