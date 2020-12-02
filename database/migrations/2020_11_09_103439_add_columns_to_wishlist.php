<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToWishlist extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('wishlists', function (Blueprint $table) {
            $table->string('Name');
            $table->string('Destination');
            $table->string('Reservations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('wishlists', function (Blueprint $table) {
            $table->dropColumn('Name');
            $table->dropColumn('Destination');
            $table->dropColumn('Reservations');
            
        });
    }
}
