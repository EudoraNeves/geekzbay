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
        // Create Friend List table data
        
        Schema::create('friend_list', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('buddy_id')->unsigned();
            $table->bigInteger('friend_id')->unsigned();
            $table->foreign('buddy_id')->references('id')->on('buddies');
            $table->foreign('friend_id')->references('id')->on('buddies');
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
        Schema::dropIfExists('friend_list');
    }
};
