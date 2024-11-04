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
        Schema::create('item_inventory_variants', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid_inventory')->unique();
            $table->uuid('uuid_item');
            $table->uuid('uuid_item_multiple_price_variant');
            $table->enum('track_stock',['yes','no']);
            $table->integer('in_stock');
            $table->enum('alerts',['yes','no']);
            $table->integer('alert_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_inventory_variants');
    }
};
