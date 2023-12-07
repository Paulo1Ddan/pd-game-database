<?php

namespace App\Http\Traits\App;

trait TypesTrait{

    public function validationRules():array
    {
        return[
            'genre_id' => ['required', 'exists:genres,id,user_id,'.auth()->user()->id],
            'name' => ['required', 'max:50'],
        ];
    }

    public function validationMessages():array
    {
        return[
            'genre_id' => [
                'required' => 'O campo genero deve ser preenchido',
                'exists' => 'Genero não encontrado'
            ],
            'name' => [
                'required' => 'O campo subgenero deve ser preenchido',
                'max' => 'O campo subgenero deve conter no maximo 50 caracteres'
            ],
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