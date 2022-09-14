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
        Schema::create('buddies_in_events', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('buddy_id')->unsigned();
            $table->bigInteger('event_id')->unsigned();
            $table->foreign('buddy_id')->references('id')->on('buddies');
            $table->foreign('event_id')->references('id')->on('events');
            $table->enum('status',['Going','Maybe',"Can&apos;t go"]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('buddies_in_events');
    }
};
