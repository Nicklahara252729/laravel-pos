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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid_customer')->unique();
            $table->uuid('uuid_outlet');
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('phone',15)->nullable();
            $table->date('birthday')->nullable();
            $table->enum('gender',['laki - laki','perempuan'])->nullable();
            $table->text('address')->nullable();
            $table->string('city',100)->nullable();
            $table->string('state',150)->nullable();
            $table->string('zip_code',15)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
