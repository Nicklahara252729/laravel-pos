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
        Schema::create('receipe_semi_finisheds', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid_receipe_item_ing')->unique();
            $table->uuid('uuid_receipe_item');
            $table->uuid('uuid_ingredient_library');
            $table->uuid('uuid_item_price_varian')->nullable();
            $table->string('variant_name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('receipe_semi_finisheds');
    }
};
