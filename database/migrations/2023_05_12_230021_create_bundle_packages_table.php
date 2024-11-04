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
        Schema::create('bundle_packages', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid_bundle_package')->unique();
            $table->string('bundle_package_image')->nullable();
            $table->string('bundle_name');
            $table->double('bundle_price');
            $table->enum('is_multiple_price',['yes','no'])->nullable();
            $table->enum('status',['active','deactive'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bundle_packages');
    }
};

