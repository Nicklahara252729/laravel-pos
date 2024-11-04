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
        Schema::create('sales_types', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid_sales_type')->unique();
            $table->uuid('uuid_outlet');
            $table->uuid('uuid_gratuity');
            $table->string('sales_type_name');
            $table->enum('sales_status',['active','deactive']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales_types');
    }
};
