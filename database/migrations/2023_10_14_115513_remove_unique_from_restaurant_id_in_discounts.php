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
        Schema::table('restaurant_id_in_discounts', function (Blueprint $table) {
            Schema::table('discounts', function (Blueprint $table) {
            $table->dropUnique('discounts_restaurant_id_unique'); // Remove the unique constraint
        });
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('restaurant_id_in_discounts', function (Blueprint $table) {
           Schema::table('discounts', function (Blueprint $table) {
            $table->unique('restaurant_id', 'discounts_restaurant_id_unique'); // Re-add the unique constraint if needed
        });
        });
    }
};