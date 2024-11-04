<?php

namespace App\Models\Ingredient\IngredientLibrary;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IngredientLibrary extends Model
{
    use HasFactory;
    protected $guarded      = [];
    protected $hidden       = ['id', 'created_at', 'updated_at'];
    public $type            = ['raw', 'semi-finished'];
    public $unit            = [
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
    ];
}
