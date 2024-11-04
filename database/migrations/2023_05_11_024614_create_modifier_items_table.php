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
        Schema::create('modifier_items', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid_modifier_item')->unique();
            $table->uuid('uuid_modifier');
            $table->uuid('uuid_item');
            $table->uuid('uuid_modifier_option');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('modifier_items');
    }
};
