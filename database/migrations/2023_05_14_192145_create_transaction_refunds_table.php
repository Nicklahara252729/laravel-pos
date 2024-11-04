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
        Schema::create('transaction_refunds', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid_transaction_refund')->unique();
            $table->uuid('uuid_transaction');
            $table->date('tanggal');
            $table->string('refund_by');
            $table->enum('reason',['returned goods','accidental charge','cancelled order','other']);
            $table->string('reason_other')->nullable()->comment("jika pilihannya other, maka ini diisi");
            $table->string('collected_by')->nullable();
            $table->double('subtotal');
            $table->text('gratuity')->nullable()->comment("format : {gratuity_name, amount, jumlah}");
            $table->text('tax')->nullable()->comment("format : {tax_informationm, amount, jumlah}");
            $table->double('total');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction_refunds');
    }
};
