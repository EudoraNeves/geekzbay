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
        // Create Buddies in Communities table data
        
        Schema::create('buddies_in_communities', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('buddy_id')->unsigned();
            $table->bigInteger('community_id')->unsigned();
            $table->foreign('buddy_id')->references('id')->on('buddies');
            $table->foreign('community_id')->references('id')->on('communities');
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
        Schema::dropIfExists('buddies_in_communities');
    }
};
