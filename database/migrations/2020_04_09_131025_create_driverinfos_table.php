<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDriverinfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('driverinfos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('personalinfo_id');
            $table->string('driver_name')->nullable();
            $table->string('driver_nid')->nullable();
            $table->string('driver_license')->nullable();
            $table->string('driver_contact')->nullable();
            $table->mediumText('driver_address')->nullable();
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
        Schema::dropIfExists('driverinfos');
    }
}
