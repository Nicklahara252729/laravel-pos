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
        Schema::create('payment_assign_outlets', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid_assign_outlet')->unique();
            $table->uuid('uuid_outlet');
            $table->uuid('uuid_payment_configuration');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_assign_outlets');
    }
};