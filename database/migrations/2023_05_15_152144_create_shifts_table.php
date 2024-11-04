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
        Schema::create('shifts', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid_shift')->unique();
            $table->uuid('uuid_outlet');
            $table->uuid('uuid_user');
            $table->string('user_name');
            $table->string('outlet');
            $table->dateTime('start_shift');
            $table->dateTime('end_shift');
            $table->double('total_expected');
            $table->double('total_actual');
            $table->double('starting_cash');
            $table->double('cash_sales');
            $table->double('cash_from_invoice');
            $table->double('cash_refund');
            $table->double('total_expense');
            $table->double('total_income');
            $table->double('expected_ending_cash');
            $table->double('actual_ending_cash');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shifts');
    }
};