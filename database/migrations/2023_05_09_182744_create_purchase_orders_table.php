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
        Schema::create('purchase_orders', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid_po')->unique();
            $table->uuid('uuid_outlet');
            $table->uuid('uuid_supplier')->nullable();
            $table->text('note')->nullable();
            $table->string('po_number')->nullable();
            $table->string('po_status');
            $table->enum('type',['item','ingredient']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_orders');
    }
};
