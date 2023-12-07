<?php

namespace App\Http\Requests;

use App\Http\Traits\App\DifficultyTrait;
use Illuminate\Foundation\Http\FormRequest;

class UpdateDifficultyRequest extends FormRequest
{

    use DifficultyTrait;

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return $this->validationRules();
    }

    public function messages(): array
    {
        return $this->validationMessages();
    }
}
