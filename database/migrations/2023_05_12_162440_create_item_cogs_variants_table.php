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
        Schema::create('item_cogs_variants', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid_cogs')->unique();
            $table->uuid('uuid_item');
            $table->uuid('uuid_item_multiple_price_variant');
            $table->enum('track_cogs',['yes','no']);
            $table->double('avg_stock');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_cogs_variants');
    }
};
