<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusinessTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business', function (Blueprint $table) {
            //
            $table->increments('id');
            $table->string('name');
            $table->string('rif');
            $table->string('address');
            $table->string('email');
            $table->integer('number_telephone_id')->unsigned();
            $table->foreign('number_telephone_id')->references('id')->on('number_telephone');
            $table->string('number_contact');
            $table->integer('state_id')->unsigned();
            $table->foreign('state_id')->references('id')->on('state');
            $table->integer('municipality_id')->unsigned();
            $table->foreign('municipality_id')->references('id')->on('municipality');
            $table->integer('parish_id')->unsigned();
            $table->foreign('parish_id')->references('id')->on('parish');
           /* $table->integer('sector_id')->unsigned();
            $table->foreign('sector_id')->references('id')->on('sector');*/
            $table->string('sector')->nullable();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('business');
    }
}
