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
        Schema::create('communities_in_locations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('community_id')->unsigned();
            $table->bigInteger('location_id')->unsigned();
            $table->foreign('community_id')->references('id')->on('communities');
            $table->foreign('location_id')->references('id')->on('locations');
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
        Schema::dropIfExists('communities_in_locations');
    }
};
