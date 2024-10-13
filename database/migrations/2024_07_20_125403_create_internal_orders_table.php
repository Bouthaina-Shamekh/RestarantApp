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
        Schema::create('internal_orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_status');
            $table->string('reason_of_refuse')->nullable();
            $table->tinyInteger('store_accept_status');
            $table->tinyInteger('type_payment');
            $table->integer('voucher')->nullable();
            $table->integer('tax');
            $table->integer('total_amount');
            $table->integer('table_number')->nullable();
            $table->foreignId('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('internal_orders');
    }
};
