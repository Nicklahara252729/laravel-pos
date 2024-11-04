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
        Schema::create('ingredient_libraries', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid_ingredient_library')->unique();
            $table->uuid('uuid_outlet');
            $table->uuid('uuid_ingredient_category');
            $table->string('ingredient_name');
            $table->enum('unit', [
                'bal (bal)',
                'barrel (bbl)',
                'batang (btg)',
                'botol (bal)',
                'box (box)',
                'bungkus (bks)',
                'butir (btr)',
                'centimeter (cm)',
                'cup (c)',
                'ekor (ekr)',
                'fluid ounce (fl oz)',
                'gallon (gal)',
                'gram (g)',
                'gros (grs)',
                'ikat (ikt)',
                'inch (in)',
                'jar',
                'kaleng (klg)',
                'kardus (kds)',
                'karton (ktn)',
                'karung (krg)',
                'kilogram (kg)',
                'krat (crt)',
                'kwintal (kw)',
                'lembar (lbr)',
                'litre (l)',
                'lusin (lsn)',
                'meter (m)',
                'miligram (mg)',
                'mililitre (ml)',
                'ons (ons)',
                'ounce (oz)',
                'pack (pck)',
                'pieces (pcs)',
                'potong (ptg)',
                'pound (lb)',
                'quart (q)',
                'sachet (sct)',
                'tablespoon (tbsp)',
                'teaspoon (tsp)',
                'ton (tn)',
                'whole'
            ]);
            $table->string('photo')->nullable();
            $table->enum('type',['raw','semi-finished']);
            $table->integer('semi_finish_amount')->nullable()->comment("Contoh:1 semi finish amount yang tercatat dapat menghasilkan 100 patty");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ingredient_libraries');
    }
};
