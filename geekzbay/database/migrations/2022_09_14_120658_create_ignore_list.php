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
        // Create ignore list table data
        
        Schema::create('ignore_list', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('buddy_id')->unsigned();
            $table->bigInteger('badperson_id')->unsigned();
            $table->foreign('buddy_id')->references('id')->on('buddies');
            $table->foreign('badperson_id')->references('id')->on('buddies');
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
        Schema::dropIfExists('ignore_list');
    }
};
