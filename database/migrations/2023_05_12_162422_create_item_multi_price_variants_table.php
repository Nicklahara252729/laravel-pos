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
        Schema::create('item_multi_price_variants', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid_item_multi_price_variant')->unique();
            $table->uuid('uuid_item');
            $table->uuid('uuid_sales_type');
            $table->string('variant_name');
            $table->string('sku');
            $table->double('price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_multi_price_variants');
    }
};
