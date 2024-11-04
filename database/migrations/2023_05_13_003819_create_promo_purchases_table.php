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
        Schema::create('promo_purchases', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid_promo_purchase')->unique();
            $table->uuid('uuid_promo');
            $table->uuid('uuid_category')->nullable();
            $table->enum('purchase_type',['item','category']);
            $table->integer('qty')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('promo_purchases');
    }
};
