<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNumberTelephoneTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('number_telephone', function (Blueprint $table) {
            //
            $table->increments('id');
            $table->string('code', 4);
            $table->string('number');
            $table->string('status');
            $table->string('cc');
            $table->string('cl');
            $table->string('pc');
            $table->string('pl');
            $table->integer('sleeve_id')->unsigned();
            $table->foreign('sleeve_id')->references('id')->on('sleeve');
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
        Schema::table('number_telephone', function (Blueprint $table) {
            //
        });
    }
}
