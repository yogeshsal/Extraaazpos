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
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Title of the location
            $table->enum('type', ['Online', 'Inventory', 'Point Of Sale']); // Type of the location
            $table->string('handle')->nullable(); // Handle (nullable)
            $table->string('tax_number')->nullable(); // Tax Number (nullable)
            $table->string('city'); // City where the location is
            $table->string('state')->nullable(); // State (nullable)
            $table->string('fssai_id')->nullable(); // FSSAI ID (nullable)
            $table->text('address'); // Address
            $table->string('stock_location')->nullable(); // Stock Location (nullable)
            $table->string('brand')->nullable(); // Brand (nullable)
            $table->integer('max_slot_number')->nullable(); // Max Slot Number (nullable)
            $table->timestamp('last_publish')->nullable(); // Last publish date (nullable)
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
