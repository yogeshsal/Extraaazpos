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
        Schema::create('categories', function (Blueprint $table) {
           $table->id();
            $table->string('user_id');
            $table->string('cat_name');
            $table->string('cat_short_name');
            $table->string('cat_handle');
            $table->string('cat_timing_group')->nullable();
            $table->text('cat_desc')->nullable();
            $table->unsignedBigInteger('cat_parent_category')->nullable();
            $table->foreign('cat_parent_category')->references('id')->on('categories');
            $table->string('cat_kot_type')->nullable();
            $table->string('cat_image')->nullable();
            $table->string('restaurant_id')->nullable();
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
        Schema::dropIfExists('categories');
    }
};