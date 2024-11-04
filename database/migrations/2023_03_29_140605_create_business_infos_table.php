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
        Schema::create('business_infos', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid_business_info')->unique();
            $table->uuid('uuid_user');
            $table->string('business_name')->nullable();
            $table->string('business_address')->nullable();
            $table->integer('id_province')->nullable();
            $table->integer('id_city')->nullable();
            $table->integer('id_district')->nullable();
            $table->integer('postal_code')->nullable();
            $table->string('nik_name')->nullable();
            $table->string('nik')->nullable();
            $table->string('npwp_name')->nullable();
            $table->string('npwp')->nullable();
            $table->string('npwp_photo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('business_infos');
    }
};
