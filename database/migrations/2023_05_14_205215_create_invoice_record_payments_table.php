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
        Schema::create('invoice_record_payments', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid_inv_record_payment')->unique();
            $table->uuid('uuid_invoice');
            $table->double('amount_received');
            $table->date('payment_date');
            $table->enum('payment_type',["cash", "check", "bank transfer", "other"]);
            $table->text('note')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoice_record_payments');
    }
};
