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
        Schema::create('modifiers', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid_modifier')->unique();
            $table->uuid('uuid_outlet');
            $table->string('modifier_name');
            $table->enum('is_limit',['yes','no'])->default("no");
            $table->enum('is_stock',['yes','no'])->default("no");
            $table->enum('is_limit_required',['yes','no'])->default("no");
            $table->integer('max_number_limit')->nullable();
            $table->integer('min_number_limit')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('modifiers');
    }
};
