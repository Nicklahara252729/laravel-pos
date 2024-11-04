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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid_item')->unique();
            $table->uuid('uuid_outlet');
            $table->string('product_name');
            $table->uuid('uuid_category');
            $table->text('description');
            $table->enum('is_order_self',['yes','no']);
            $table->enum('condition',['new','refurbished','used'])->nullable();
            $table->double('weight')->nullable();
            $table->enum('weight_unit',['gr','kg'])->nullable();
            $table->double('dimension_length')->nullable();
            $table->double('dimension_width')->nullable();
            $table->double('dimension_height')->nullable();
            $table->enum('dimension_unit',['m','cm','inch'])->nullable();
            $table->enum('is_pre_order',['yes','no'])->nullable();
            $table->integer('processing_time')->nullable();
            $table->enum('is_multiple_price',['yes','no'])->nullable();
            $table->double('price')->nullable();
            $table->string('sku')->nullable();
            $table->string('photo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
