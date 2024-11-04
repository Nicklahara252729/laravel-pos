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
        Schema::create('purchase_order_histories', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid_po_history')->unique();
            $table->uuid('uuid_po');
            $table->uuid('uuid_outlet');
            $table->uuid('uuid_user');
            $table->text('action_description');
            $table->text('note_po')->nullable()->comment("note yg terdapat dari purchase order");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_order_histories');
    }
};