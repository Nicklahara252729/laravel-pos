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
        Schema::create('pin_accesses', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid_pin_access')->unique();
            $table->uuid('uuid_user');
            $table->string('print_bill',5)->nullable();
            $table->string('manage_all_open_bills',5)->nullable();
            $table->string('apply_discount_bill_item',5)->nullable();
            $table->string('manage_discounts',5)->nullable();
            $table->string('issue_refunds',5)->nullable();
            $table->string('resend_receipts',5)->nullable();
            $table->string('record_invoice_payments',5)->nullable();
            $table->string('cancel_invoices',5)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pin_accesses');
    }
};
