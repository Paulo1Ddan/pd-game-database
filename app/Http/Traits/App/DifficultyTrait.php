<?php

namespace App\Http\Traits\App;

trait DifficultyTrait{

    public function validationRules():array
    {
        return[
            'system' => ['required'],
            'description' => ['required'],
        ];
    }

    public function validationMessages():array
    {
        return[
            'system' => [
                'required' => 'O campo sistema de dificuldade deve ser preenchido'
            ],
            'description' => [
                'required' => 'O campo descrição deve ser preenchido'
            ]
        ];
    }

}