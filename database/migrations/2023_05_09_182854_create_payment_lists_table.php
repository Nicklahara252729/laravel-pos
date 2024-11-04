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
        Schema::create('payment_lists', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid_payment_list')->unique();
            $table->enum('is_sub_payment',['yes','no']);
            $table->string('list')->nullable();
            $table->string('sub_list')->nullable();
            $table->string('icon_list')->nullable();            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_lists');
    }
};