<?php

namespace App\Http\Traits\App;

trait DifficultyTrait{

    public function validationRules():array
    {
        return[
            'system' => ['required'],
            'description' => ['required'],
            'color' => ['required']
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
            ],
            'color' => [
                'required' => 'O campo cor da dificuldade deve ser preenchido'
            ]
        ];
    }

    public function validateId():array
    {
        return[
            'user_id' => ['exists:users,id', 'required']
        ];
    }

    public function messagesId():array
    {
        return[
            'user_id' => [
                'exists' => 'Usuario inválido. Recarregue a pagina',
                'required' => 'Usuário inválido. Recarregue a pagina'
            ]
        ];
    }

}