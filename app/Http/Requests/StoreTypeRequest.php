<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Traits\App\TypesTrait;

class StoreTypeRequest extends FormRequest
{
    use TypesTrait;

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
