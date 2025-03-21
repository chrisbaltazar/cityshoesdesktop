<?php

namespace App\Http\Requests;

use App\Models\ValueObjects\SaleTypes;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class SaleRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'salesman' => 'required|string|max:255',
            'type' => 'required|string|max:255|in:' . implode(',', SaleTypes::cases()),
            'details' => 'required|array',
        ];
    }
}
