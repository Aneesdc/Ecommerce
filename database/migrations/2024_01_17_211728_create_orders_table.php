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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('product_name')->nullable();
            $table->integer('product_id')->nullable();
            $table->string('price')->nullable();
            $table->integer('quantity')->nullable();
            $table->string('total_price')->nullable();
            $table->integer('status')->default(0);
            $table->date('order_submission_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
