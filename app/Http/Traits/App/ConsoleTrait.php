<?php

namespace App\Http\Traits\App;

trait ConsoleTrait{

    public function validationRules():array
    {
        return[
            'name' => ['required', 'max:50'],
            'color' => ['required'],
            'img' => ['required', 'file', 'mimes:jpg,jpeg,webp,png']
        ];
    }

    public function validationMessages():array
    {
        return[
            'name' => [
                'required' => 'O campo console deve ser preenchido',
                'max' => 'O campo console deve conter no maximo 50 caracteres',
            ],
            'color' => [
                'required' => 'O campo cor da pontuação deve ser preenchido'
            ],
            'img' => [
                'required' => 'O campo de imagem deve ser preenchido',
                'file' => 'Envie somente arquivos',
                'mimes' => 'Selecione apenas aquivos com extenção JPG, JPEG, PNG ou WEBP'
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

    public function validateImg():array
    {
        return [
            'img' => ['required', 'file', 'mimes:jpg,jpeg,webp,png']
        ];
    }

    public function messagesImg():array
    {
        return [
            'img' => [
                'required' => 'O campo de imagem deve ser preenchido',
                'file' => 'Envie somente arquivos',
                'mimes' => 'Selecione apenas aquivos com extenção JPG, JPEG, PNG ou WEBP'
            ]
        ];
    }

    public function getConsoleData($console, $img):array
    {

        return [
            'user_id' => $console['user_id'],
            'name' => $console['name'],
            'color' => $console['color'],
            'img' => $img
        ];
    }

}