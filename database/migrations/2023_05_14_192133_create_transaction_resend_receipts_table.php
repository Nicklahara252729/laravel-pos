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
        Schema::create('transaction_resend_receipts', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid_trx_resend_receipt')->unique();
            $table->uuid('uuid_transaction');
            $table->string('email');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction_resend_receipts');
    }
};
