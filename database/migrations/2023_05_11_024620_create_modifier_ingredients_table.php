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
        Schema::create('modifier_ingredients', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid_modifier_ingredient')->unique();
            $table->uuid('uuid_modifier');
            $table->uuid('uuid_modifier_option');
            $table->uuid('uuid_ingredient_library');
            $table->integer('qty');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('modifier_ingredients');
    }
};
