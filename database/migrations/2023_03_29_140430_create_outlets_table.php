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
        Schema::create('outlets', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid_outlet')->unique();
            $table->string('outlet_name');
            $table->text('address');
            $table->integer('id_province')->nullable();
            $table->integer('id_city')->nullable();
            $table->integer('id_district')->nullable();
            $table->integer('postal_code')->nullable();
            $table->string('phone_number',20)->nullable();
            $table->string('logo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('outlets');
    }
};
