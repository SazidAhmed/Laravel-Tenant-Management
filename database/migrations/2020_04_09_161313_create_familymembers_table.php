<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFamilymembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('familymembers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('personalinfo_id');
            $table->string('family_member_name')->nullable();
            $table->string('family_member_nid')->nullable();
            $table->string('family_member_relation')->nullable();
            $table->string('family_member_age')->nullable();
            $table->mediumText('family_member_occupation')->nullable();
            $table->string('family_member_contact')->nullable();
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
        Schema::dropIfExists('familymembers');
    }
}
