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
        // Create Update the user table data

        Schema::table('users', function (Blueprint $table) {
            $table->longText('profilePicture')->default(base64_encode(file_get_contents(public_path('user-icon.png'))))->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->longText('profilePicture')->default(null)->change();
        });
    }
};
