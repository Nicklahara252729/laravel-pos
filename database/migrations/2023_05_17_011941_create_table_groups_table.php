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
        Schema::create('table_groups', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid_table_group')->unique();
            $table->uuid('uuid_outlet');
            $table->string('group_name');
            $table->enum('status',['active','inactive']);
            $table->integer('jumlah_baris');
            $table->integer('jumlah_kolom');
            $table->timestamp('deleted_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_groups');
    }
};