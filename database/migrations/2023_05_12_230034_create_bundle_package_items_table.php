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
        Schema::create('bundle_package_items', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid_bundle_package_item')->unique();
            $table->uuid('uuid_bundle_package');
            $table->uuid('uuid_item');
            $table->integer('qty');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bundle_package_items');
    }
};
