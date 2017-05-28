<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tanks', function (Blueprint $tanks) {
            //
            $tanks->increments('id');
            $tanks->string('name');
            $tanks->string('address', 255);

            $tanks->integer('ads_id')->unsigned();
            $tanks->foreign('ads_id')->references('id')->on('ads');
            $tanks->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tanks');
    }
}
