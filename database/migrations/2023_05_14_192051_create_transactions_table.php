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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid_transaction')->unique();
            $table->uuid('uuid_outlet');
            $table->uuid('uuid_payment_configuration');
            $table->uuid('uuid_payment_list');
            $table->uuid('uuid_user');
            $table->uuid('uuid_customer')->nullable();
            $table->string('customer_name')->nullable();
            $table->date('tanggal');
            $table->string('receipt_number');
            $table->string('served_by')->nullable();
            $table->string('collected_by')->nullable();
            $table->double('subtotal');
            $table->text('gratuity')->nullable()->comment("format : {gratuity_name, amount, jumlah}");
            $table->text('tax')->nullable()->comment("format : {tax_informationm, amount, jumlah}");
            $table->double('total');
            $table->double('cash');
            $table->double('change');
            $table->string('sales_type');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
