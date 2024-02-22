<?php

namespace App\Http\Traits\App;

trait UserTrait{

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
