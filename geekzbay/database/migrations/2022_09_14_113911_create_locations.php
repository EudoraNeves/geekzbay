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
        // Create locations table data
        
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('profilePicture');
            $table->enum('type', ['Shop', 'Bar', 'Club', 'Library', 'Cinema', null]);
            $table->text('desc');
            $table->text('homePage');
            $table->string('address_city');
            $table->string('address_road');
            $table->string('address_number');
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
        Schema::dropIfExists('locations');
    }
};
