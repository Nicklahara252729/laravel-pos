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
        Schema::create('ingredient_raw_cogs', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid_ingredient_raw_cogs')->unique();
            $table->uuid('uuid_ingredient_library');
            $table->uuid('uuid_ing_raw_inv')->nullable();
            $table->enum('track_cogs', ['yes', 'no']);
            $table->double('avg_cogs');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ingredient_raw_cogs');
    }
};
