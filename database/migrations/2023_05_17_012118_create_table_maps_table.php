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
        Schema::create('table_maps', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid_table_map')->unique();
            $table->uuid('uuid_table_group');
            $table->uuid('uuid_table_info');
            $table->integer('position');
            $table->timestamp('deleted_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_maps');
    }
};
