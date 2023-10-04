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
        Schema::create('modifiergroups', function (Blueprint $table) {
            $table->id();
            $table->string('modifier_group_name');
            $table->string('modifier_group_type');
            $table->integer('modifier_group_assoc_items_count')->unsigned();
            $table->text('modifier_group_modifiers');
            $table->string('modifier_group_short_name')->nullable();
            $table->string('modifier_group_handle');
            $table->text('modifier_group_desc')->nullable();
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
        Schema::dropIfExists('modifiergroups');
    }
};
