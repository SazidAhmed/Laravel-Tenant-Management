<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLandlordinfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('landlordinfos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('personalinfo_id');
            $table->string('prev_landlord_name')->nullable();
            $table->string('prev_landlord_contact')->nullable();
            $table->mediumText('prev_landloard_address')->nullable();
            $table->mediumText('reason_to_leave')->nullable();
            $table->string('pres_landlord_name')->nullable();
            $table->string('pres_landlord_contact')->nullable();
            $table->string('tenent_since')->nullable(); 
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
        Schema::dropIfExists('landlordinfos');
    }
}
