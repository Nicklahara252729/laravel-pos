<?php

namespace App\Http\Requests\Ingredient\DaftarBahan;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'uuid_outlet'   => 'required',
            'uuid_ingredient_category'   => [
                'required',
                Rule::exists('ingredient_categories')->where(function ($query) {
                    return $query->where('uuid_outlet', $this->uuidOutlet());
                }),
            ],
            'ingredient_name' => 'required',
            'unit' => [
                'required',
                Rule::in([
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
                ]),
            ],
            'photo' => 'nullable|mimes:jpeg,png,jpg,svg|max:2048',
            'type' => 'required|in:raw,semi-finished',
            'semi_finish_amount' => 'nullable|integer',
        ];
    }

    public function uuidOutlet()
    {
        $request = Request();
        return !is_null(authAttribute()['uuidOutlet']) ? authAttribute()['uuidOutlet'] : $request->header('outlet');
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'uuid_outlet' => $this->uuidOutlet()
        ]);
    }
}
