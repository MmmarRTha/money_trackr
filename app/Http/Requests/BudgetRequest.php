<?php

namespace App\Http\Requests;

use App\BudgetType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;
use Illuminate\Contracts\Validation\ValidationRule;

class BudgetRequest extends FormRequest
{
    public function messages(): array
    {
        return [
            'name.required' => 'The budget name is required',
            'amount.required' => 'The amount is required',
            'amount.decimal' => 'The amount must be a valid number',
            'amount.min' => 'The amount must be greater than 0',
            'type.required' => 'The budget type is required',
            'type.enum' => 'The selected budget type is invalid',
        ];
    }

    /**
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:100'],
            'amount' => ['required', 'decimal:0,2', 'min:0.01'],
            'type' => ['required', new Enum(BudgetType::class)],
        ];
    }
}
