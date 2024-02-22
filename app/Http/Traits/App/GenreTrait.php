<?php

namespace App\Http\Traits\App;

trait GenreTrait{

    public function validationRules():array
    {
        return[
            'name' => ['required'],
            'color' => ['required']
        ];
    }

    public function validationMessages():array
    {
        return[
            'name' => [
                'required' => 'O campo nome deve ser preenchido'
            ],
            'color' => [
                'required' => 'O campo cor do genero deve ser preenchido'
            ]
        ];
    }

}