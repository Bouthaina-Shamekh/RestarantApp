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
        Schema::create('delivery_agent_orders', function (Blueprint $table) {
            $table->string('details');
            $table->tinyInteger('status');
            $table->string('expected_delivery_time');
            $table->string('real_delivery_time');
            $table->foreignId('delivery_agent_id');
            $table->foreignId('outer_order_id');
            $table->primary(['delivery_agent_id','outer_order_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('delivery_agent_orders');
    }
};
