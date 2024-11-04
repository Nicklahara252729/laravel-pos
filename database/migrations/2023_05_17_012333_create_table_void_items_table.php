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
        Schema::create('table_void_items', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid_table_void_item')->unique();
            $table->uuid('uuid_table_transaction');
            $table->uuid('uuid_item');
            $table->string('item_name');
            $table->uuid('uuid_user');
            $table->double('total_price');
            $table->integer('qty');
            $table->text('void_reason');
            $table->string('executed_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_void_items');
    }
};
