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
        // Create communities in places table data

        Schema::create('communities_in_places', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('community_id')->unsigned();
            $table->bigInteger('place_id')->unsigned();
            $table->foreign('community_id')->references('id')->on('communities');
            $table->foreign('place_id')->references('id')->on('places');
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
        Schema::dropIfExists('communities_in_places');
    }
};
