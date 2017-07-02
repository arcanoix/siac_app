<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSleeveTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sleeve', function (Blueprint $sleeve) {
            //tabla manga
            $sleeve->increments('id');
            $sleeve->string('name', 100);
            $sleeve->string('description', 255);
            $sleeve->string('address', 255);
            $sleeve->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('sleeve');
    }
}
