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
        Schema::create('transaction_refund_items', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid_transaction_refund_item')->unique();
            $table->uuid('uuid_transaction_refund');
            $table->uuid('uuid_item');
            $table->string('item_name');
            $table->integer('item_qty');
            $table->string('item_price')->nullable();
            $table->text('modifier')->nullable()->comment("format : [{modifier_name, option_name, price},{modifier_name, option_name, price}]");
            $table->text('discount')->nullable()->comment("format : [{discount_name, amount, jumlah},{discount_name, amount, jumlah}]");
            $table->double('item_total');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction_refund_items');
    }
};
