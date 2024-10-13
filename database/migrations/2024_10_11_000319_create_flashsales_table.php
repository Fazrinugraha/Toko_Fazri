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
        Schema::create('flashsales', function (Blueprint $table) {
            $table->id(); 
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade'); 
            $table->dateTime('start_time');
            $table->dateTime('end_time'); 
            $table->enum('status', ['active', 'inactive'])->default('inactive');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flashsales');
    }
};