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
            $table->string('user_id');            
            $table->string('item_name');
            $table->string('description');
            $table->unsignedBigInteger('item_associated_location')->nullable();
            $table->text('item_description')->nullable();
            $table->unsignedBigInteger('item_category_id');
            $table->decimal('item_sell_price', 10, 2);
            $table->string('item_short_name');
            $table->string('item_food_type');
            $table->string('item_pos_code');
            $table->string('item_is_recommended')->nullable();
            $table->string('item_is_package_good')->nullable();
            $table->string('item_sell_by_weight')->nullable();
            $table->string('item_image')->nullable();
            $table->unsignedBigInteger('item_tax_type_id')->nullable();
            $table->unsignedBigInteger('item_charge_id')->nullable();
            $table->decimal('item_default_sell_price', 10, 2)->nullable();
            $table->decimal('item_markup_price', 10, 2)->nullable();
            $table->decimal('item_aggregator_price', 10, 2)->nullable();
            $table->string('item_external_id')->nullable();
            $table->unsignedBigInteger('item_modifier_id')->nullable();
            $table->boolean('item_advance_order')->nullable();
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
