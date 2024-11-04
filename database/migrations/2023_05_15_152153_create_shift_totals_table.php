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
        Schema::create('shift_totals', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid_shift_total')->unique();
            $table->uuid('uuid_shift');
            $table->enum('type',['expense','income']);
            $table->string('item');
            $table->double('amount');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shift_totals');
    }
};