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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('short_name');
            $table->string('handle');
            $table->string('category');
            $table->string('pos_code');
            $table->string('food_type');
            $table->integer('sort_order');
            $table->boolean('is_recommended');
            $table->boolean('is_packaged_good');
            $table->boolean('sell_by_weight');
            $table->decimal('default_sales_price', 8, 2);
            $table->decimal('markup_price', 8, 2);
            $table->decimal('aggregator_price', 8, 2);
            $table->string('external_id');
            $table->text('description');
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
        Schema::dropIfExists('items');
    }
};
