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
        Schema::create('promo_items', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid_promo_item')->unique();
            $table->uuid('uuid_promo_purchase');
            $table->uuid('uuid_item');
            $table->uuid('uuid_item_price_variant')->nullable();
            $table->integer('qty');            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('promo_items');
    }
};
