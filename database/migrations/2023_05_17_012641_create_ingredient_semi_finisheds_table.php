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
        Schema::create('ingredient_semi_finisheds', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid_ing_raw_receipe')->unique();
            $table->uuid('uuid_ingredient_library');
            $table->uuid('uuid_ingredient_raw_inv');
            $table->uuid('uuid_receipe_semi_finished');
            $table->integer('qty');            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ingredient_semi_finisheds');
    }
};
