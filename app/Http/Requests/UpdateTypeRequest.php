<?php

namespace App\Http\Requests;

use App\Http\Traits\App\TypesTrait;
use Illuminate\Foundation\Http\FormRequest;

class UpdateTypeRequest extends FormRequest
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
