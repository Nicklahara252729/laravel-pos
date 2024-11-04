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
        Schema::create('promo_assign_sales_types', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid_promo_assign_sales_type')->unique();
            $table->uuid('uuid_promo');
            $table->uuid('uuid_sales_type');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('promo_assign_sales_types');
    }
};
