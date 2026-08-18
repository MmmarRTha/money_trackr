<?php

namespace App\Http\Requests;

use App\ExpenseCategory;
use App\Models\Budget;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ConditionalRules;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;

class ExpenseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $budget = $this->route('budget');

        return $budget && $this->user()->can('update', $budget);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|ConditionalRules|array<mixed>|string>
     */
    public function rules(): array
    {
        /** @var Budget $budget */
        $budget = $this->route('budget');

        return [
            'name' => ['required', 'string', 'max:255'],
            'amount' => ['required', 'decimal:0,2', 'min:0.01'],
            'category' => Rule::when(
                $budget->isGeneral(),
                ['required', new Enum(ExpenseCategory::class)],
                ['nullable']
            ),
        ];
    }
}
