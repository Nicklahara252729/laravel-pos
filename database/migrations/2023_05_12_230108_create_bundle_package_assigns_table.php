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
        Schema::create('bundle_package_assigns', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid_bundle_package_assign')->unique();
            $table->uuid('uuid_outlet');
            $table->uuid('uuid_bundle_package');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bundle_package_assigns');
    }
};
