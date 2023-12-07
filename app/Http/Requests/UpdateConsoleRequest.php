<?php

namespace App\Http\Requests;

use App\Http\Traits\App\ConsoleTrait;
use Illuminate\Foundation\Http\FormRequest;

class UpdateConsoleRequest extends FormRequest
{

    use ConsoleTrait;

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {

        if($this->method() === 'PATCH'){

            $dynRules = [];

            foreach($this->validationRules() as $key => $value){
                if(array_key_exists($key, $this->request->all())) $dynRules[$key] = $value;
            }

            return $dynRules;
        }else{
            return $this->validationRules();
        }
    }

    public function messages()
    {
        return $this->validationMessages();
    }
}
