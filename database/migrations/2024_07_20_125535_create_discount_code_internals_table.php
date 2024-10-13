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
        Schema::create('discount_code_internals', function (Blueprint $table) {
            $table->double('discount_value');
            $table->foreignId('discount_code_id');
            $table->foreignId('internal_order_id');
             $table->primary(['discount_code_id','internal_order_id']);
            $table->timestamps();


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('discount_code_internals');
    }
};
