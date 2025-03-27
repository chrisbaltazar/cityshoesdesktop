<?php

namespace App\Http\Requests;

use App\Models\Enums\Payments;
use App\Models\Enums\SaleTypes;
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
            'type' => 'required|string|in:' . implode(',', SaleTypes::values()),
            'payment' => 'nullable|string|in:' . implode(',', Payments::values()),
            'details' => 'required|array',
        ];
    }
}
