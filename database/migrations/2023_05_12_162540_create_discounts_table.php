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
        Schema::create('discounts', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid_discount')->unique();
            $table->uuid('uuid_outlet');
            $table->string('discount_name');
            $table->enum('amount_status',['fixed','custom']);
            $table->integer('amount')->nullable();
            $table->enum('amount_type_fixed',['rupiah','persen'])->nullable();
            $table->enum('amount_type_custom',['rupiah','persen'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('discounts');
    }
};
