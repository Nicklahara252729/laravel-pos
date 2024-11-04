<?php

namespace App\Http\Requests\Outlet\Receipt;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Database\Query\Builder;

class UpdateRequest extends FormRequest
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
            'website_url' => 'nullable',
            'facebook_url' => 'nullable',
            'twitter_url' => 'nullable',
            'instagram_url' => 'nullable',
            'notes' => 'nullable',
        ];
    }
}
