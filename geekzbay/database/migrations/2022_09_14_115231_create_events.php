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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamp('date');
            $table->text('desc');
            $table->bigInteger('eventadmin_id')->unsigned();
            $table->bigInteger('community_id')->unsigned();
            $table->bigInteger('place_id')->unsigned();
            $table->foreign('eventadmin_id')->references('id')->on('buddies');
            $table->foreign('community_id')->references('id')->on('communities');
            $table->foreign('place_id')->references('id')->on('places');
            $table->text('alt_address_city');
            $table->text('alt_address_street');
            $table->text('alt_address_number');
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
        Schema::dropIfExists('events');
    }
};
