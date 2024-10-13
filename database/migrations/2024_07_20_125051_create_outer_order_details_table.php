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
        Schema::create('outer_order_details', function (Blueprint $table) {
            $table->id();
            $table->double('product_price');
            $table->double('product_total_amount');
            $table->string('product_note');
            $table->integer('quantity');
            $table->foreignId('product_id');
            $table->foreignId('outer_order_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('outer_order_details');
    }
};
