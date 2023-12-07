<?php

namespace App\Http\Requests;

use App\Http\Traits\App\ConsoleTrait;
use Illuminate\Foundation\Http\FormRequest;

class StoreConsoleRequest extends FormRequest
{
    use ConsoleTrait;

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return $this->validationRules();
    }

    public function messages()
    {
        return $this->validationMessages();
    }
}
