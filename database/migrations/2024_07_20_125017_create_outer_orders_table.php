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
        Schema::create('outer_orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_status');
            $table->string('reason_of_refuse')->nullable();
            $table->tinyInteger('store_accept_status');
            $table->tinyInteger('delivery_accept_status');
            $table->integer('delivery_code')->nullable();
            $table->integer('receipt_code')->nullable();
            $table->string('order_note');
            $table->integer('delivery_fee')->nullable();
            $table->tinyInteger('type_payment');
            $table->integer('delivery_tips');
            $table->integer('voucher')->nullable();
            $table->integer('tax');
            $table->integer('total_amount');
            $table->string('delivery_by');
            $table->string('delivered_phone');
            $table->foreignId('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('outer_orders');
    }
};
