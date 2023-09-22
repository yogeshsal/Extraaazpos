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
        Schema::create('daily_registers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('loc_id')->nullable();
            $table->string('location')->nullable();
            $table->string('opening_cash')->nullable();
            $table->string('opening_card')->nullable();
            $table->string('opening_credit')->nullable();
            $table->string('opening_upi')->nullable();
            $table->string('closing_cash')->nullable();
            $table->string('closing_card')->nullable();
            $table->string('closing_credit')->nullable();
            $table->string('closing_upi')->nullable();
            $table->string('difference_cash')->nullable();
            $table->string('difference_card')->nullable();
            $table->string('difference_credit')->nullable();
            $table->string('difference_upi')->nullable();
            $table->integer('user_id');
            $table->integer('status')->default(1);
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
        Schema::dropIfExists('daily_registers');
    }
};
