<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meetups', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamp('date');
            $table->text('desc');
            $table->foreignId('eventadmin_id')->references('id')->on('users');
            $table->foreignId('community_id')->references('id')->on('communities');
            $table->foreignId('location_id')->references('id')->on('locations');
            $table->text('alt_address_city')->nullabl();
            $table->text('alt_address_street')->nullable();
            $table->text('alt_address_number')->nullable();
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
        Schema::dropIfExists('meetups');
    }
};
