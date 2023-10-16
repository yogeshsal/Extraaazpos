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
            $table->increments('id');
            $table->string('user_id');
            $table->string('modifier_group_name')->nullable();
            $table->string('modifier_group_type')->nullable();
            $table->integer('modifier_group_assoc_items_count')->unsigned()->nullable();
            $table->text('modifier_group_modifiers')->nullable();
            $table->string('modifier_group_short_name')->nullable();
            $table->string('modifier_group_handle')->nullable();
            $table->text('modifier_group_desc')->nullable();
            $table->text('modifier_sort_order')->nullable();
            $table->text('modifier_external_id')->nullable();
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
