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
        Schema::create('purchase_order_ingredients', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid_po_ingredient')->unique();
            $table->uuid('uuid_po');
            $table->uuid('uuid_ingredient');
            $table->integer('qty');
            $table->double('unit_cost');
            $table->double('subtotal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_order_ingredients');
    }
};