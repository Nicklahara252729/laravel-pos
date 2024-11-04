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
        Schema::create('ingredient_raw_inventories', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid_ingredient_raw_inv')->unique();
            $table->uuid('uuid_ingredient_library');
            $table->enum('track_stock', ['yes', 'no']);
            $table->integer('in_stock');
            $table->enum('alert',['yes','no']);
            $table->integer('alert_at');            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ingredient_raw_inventories');
    }
};
