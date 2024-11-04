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
        Schema::create('table_transactions', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid_table_transaction')->unique();
            $table->uuid('uuid_table_group');
            $table->uuid('uuid_table_info');
            $table->uuid('uuid_transaction');
            $table->uuid('uuid_customer')->nullable();
            $table->enum('status',['reserved','cancelled','done']);
            $table->string('order_id');
            $table->string('receipt_number');
            $table->string('customer_name')->nullable();
            $table->integer('pax');
            $table->integer('duration');
            $table->string('phone',15)->nullable();
            $table->double('dp_reservasi')->nullable();
            $table->text('cancel_reason')->nullable();
            $table->dateTime('completed_at');
            $table->timestamp('deleted_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_transactions');
    }
};
