<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('inventories', function (Blueprint $table) {
            $table->id();
            $table->string('m_f_g_name', 25);
            $table->string('m_f_g_item_number');
            $table->string('item_number')->index();
            $table->integer('available');
            $table->boolean('l_t_l');
            $table->string('m_f_g_qty_available')->nullable();
            $table->enum('stocking', ['Yes', 'No'])->default('No');
            $table->string('special_order');
            $table->enum('oversize', ['Yes', 'No'])->default('No');
            $table->enum('addtl_handling_charge', ['Yes', 'No'])->default('No');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventories');
    }
};
