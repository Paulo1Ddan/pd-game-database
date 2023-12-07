<?php

namespace App\Http\Requests;

use App\Http\Traits\App\ConsoleTrait;
use Illuminate\Foundation\Http\FormRequest;

class UpdateConsoleImgRequest extends FormRequest
{

    use ConsoleTrait;

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return $this->validateImg();
    }

    public function messages()
    {
        return $this->messagesImg();
    }
}
