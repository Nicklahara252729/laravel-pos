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
        Schema::create('promos', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid_promo')->unique();
            $table->string('promo_name');
            $table->enum('promo_type',['discount','free','price cut'])->comment("discount per item, free item, order price cuts");
            $table->enum('reward_type',['currency','percent'])->nullable()->comment("rupiah dan persen");
            $table->enum('config',['multiple','time periode'])->comment("rupiah dan persen");
            $table->date('config_date_from')->nullable();
            $table->date('config_date_until')->nullable();
            $table->time('config_hour_from')->nullable();
            $table->time('config_hour_until')->nullable();
            $table->string('config_day')->nullable()->comment("format {sunday, monday, tuesday}");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('promos');
    }
};
