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
        Schema::create('item_price_variants', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid_item_price_variant')->unique();
            $table->uuid('uuid_item');
            $table->string('variant_name');
            $table->double('price');
            $table->string('sku');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_price_variants');
    }
};
