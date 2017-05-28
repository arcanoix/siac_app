<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCentralTelephoneTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('central_telephone', function (Blueprint $table) {
            //
            $table->increments('id');
            $table->string('name');
            $table->string('address');
            $table->integer('parish_id')->unsigned();
            $table->foreign('parish_id')->references('id')->on('parish');
            $table->integer('sector_id')->unsigned();
            $table->foreign('sector_id')->references('id')->on('sector');
            $table->integer('tanks_id')->unsigned();
            $table->foreign('tanks_id')->references('id')->on('tanks');
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
        Schema::drop('central_telephone');
    }
}
