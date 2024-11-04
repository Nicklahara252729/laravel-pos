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
        Schema::create('general_setting_assigns', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid_general_setting_assign')->unique();
            $table->uuid('uuid_outlet');
            $table->uuid('uuid_general_setting');
            $table->string('setting_status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('general_setting_assigns');
    }
};
