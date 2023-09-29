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
        Schema::create('taxs', function (Blueprint $table) {
            $table->id();
            $table->string('tax_type');
            $table->string('tax_code');
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('applicable_on');
            $table->decimal('tax_percentage', 8, 2);
            $table->string('applicable_modes');
            // You can add more fields as needed
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
        Schema::dropIfExists('taxs');
    }
};
