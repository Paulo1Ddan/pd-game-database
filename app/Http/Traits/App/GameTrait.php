<?php

namespace App\Http\Traits\App;

trait GameTrait{

    public function validationRules():array
    {
        return[
            'name' => 'required|string|max:255',
            'console_id' => 'required|exists:consoles,id,user_id,' . auth()->user()->id,
            'type_id' => 'required|exists:types,id,user_id,' . auth()->user()->id,
            'genre_id' => 'required|exists:genres,id,user_id,' . auth()->user()->id,
            'score_id' => 'required|exists:scores,id,user_id,' . auth()->user()->id,
            'difficulty_id' => 'required|exists:difficulties,id,user_id,' . auth()->user()->id,
            'date' => 'required|date',
            'time' => 'required',
            'condition' => 'required',
            'cover' => 'required|file|mimes:jpg,jpeg,webp,png',
        ];
    }

    public function validationMessages():array
    {
        return[
            'name.required' => 'O nome do jogo é obrigatório.',
            'name.max' => 'O nome do jogo não pode ter mais de 255 caracteres.',
            'console_id.required' => 'Por favor, selecione um console.',
            'console_id.exists' => 'O console selecionado não é válido.',
            'type_id.required' => 'Por favor, selecione um tipo de jogo.',
            'type_id.exists' => 'O tipo de jogo selecionado não é válido.',
            'genre_id.required' => 'Por favor, selecione um gênero.',
            'genre_id.exists' => 'O gênero selecionado não é válido.',
            'score_id.required' => 'Por favor, selecione uma pontuação.',
            'score_id.exists' => 'A pontuação selecionada não é válida.',
            'difficulty_id.required' => 'Por favor, selecione uma dificuldade.',
            'difficulty_id.exists' => 'A dificuldade selecionada não é válida.',
            'date.required' => 'A data é obrigatória.',
            'date.date' => 'A data deve ser válida.',
            'time.required' => 'A hora é obrigatória.',
            'condition.required' => 'O campo condição é obrigatório.',
            'cover.required' => 'Por favor, faça o upload da capa do jogo.',
            'cover.file' => 'O arquivo da capa do jogo deve ser um arquivo.',
            'cover.mimes' => 'O arquivo da capa do jogo deve ter um formato válido (jpg, jpeg, webp, png).',
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

    public function getGameData(array $game, string $cover_name): array
    {
        return [
            'user_id' => $game['user_id'],
            'name' => $game['name'],
            'console_id' => $game['console_id'],
            'genre_id' => $game['genre_id'],
            'type_id' => $game['type_id'],
            'date' => $game['date'],
            'time' => $game['time'],
            'score_id' => $game['score_id'],
            'difficulty_id' => $game['difficulty_id'],
            'condition' => $game['condition'],
            'cover' => $cover_name
        ];
    }
}