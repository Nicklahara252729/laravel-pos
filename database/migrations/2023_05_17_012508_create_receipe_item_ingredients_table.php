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
        Schema::create('receipe_item_ingredients', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid_receipe_semi_finished');
            $table->uuid('uuid_ingredient_library');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('receipe_item_ingredients');
    }
};
