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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid_invoice')->unique();
            $table->uuid('uuid_outlet');
            $table->date('tanggal');
            $table->string('invoice_number');
            $table->string('collected_by');
            $table->uuid('uuid_customer')->nullable();
            $table->string('customer')->nullable();
            $table->string('customer_email')->nullable();
            $table->date('due');
            $table->double('subtotal');
            $table->text('gratuity')->nullable()->comment("format : {gratuity_name, amount, jumlah}");
            $table->text('tax')->nullable()->comment("format : {tax_informationm, amount, jumlah}");
            $table->double('total');
            $table->double('amount_due');
            $table->text('note')->nullable();
            $table->enum('status',['cancelled',"unpaid","overdue","paid",'partially paid']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
