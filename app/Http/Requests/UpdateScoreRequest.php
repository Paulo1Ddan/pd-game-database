<?php

namespace App\Http\Requests;

use App\Http\Traits\App\ScoreTrait;
use Illuminate\Foundation\Http\FormRequest;

class UpdateScoreRequest extends FormRequest
{

    use ScoreTrait;

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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return $this->validationRules();
    }

    public function messages(): array
    {
        return $this->validationMessages();
    }
}
