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
        Schema::create('table_infos', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid_table_info')->unique();
            $table->string('table_name');
            $table->string('pax');
            $table->enum('bentuk_meja',['petak','lingkaran']);
            $table->enum('status',['tersedia','dipesan','dipakai']);
            $table->timestamp('deleted_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_infos');
    }
};
