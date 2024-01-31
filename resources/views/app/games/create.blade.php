@extends('layouts.app.layout')
@section('title', 'Subgeneros - Criar')

@push('style-css')
    <link rel="stylesheet" href="{{ asset('css/app/game/game.css') }}">
@endpush

@section('content')
    <div class="game default-layout">
        <h3 class="game-title text-white">Cadastrar jogo</h3>

        <div class="game-container margin-center p-3 text-white rounded mt-5">
            <form action="{{ route('game.store') }}" method="POST" enctype="multipart/form-data" class="game-form">
                @csrf

                {{-- Game --}}
                <div class="game-input-field flex-column fs-4 text-white my-3">
                    <label for="name" class="input-text">Jogo</label>
                    <input type="text" id="name" class='px-2' placeholder="Ex.: Insira o nome do jogo" name="name" value="{{ old('name') }}" autofocus>
                    @if ($errors->has('name'))
                        <label class="game-label-error">{{ $errors->first('name') }}</label>
                    @endif
                </div>

                {{-- Console --}}
                <div class="game-select-field flex-column fs-4 text-white my-3">
                    <label for="console" class="select-text">Console</label>
                    <select name="console_id" id="console" class="px-2">
                        <option class="option" value="">Selecione o console ao qual zerou o jogo</option>
                        @foreach ($consoles as $console)
                            <option class="option" value="{{ $console->id }}"
                                {{ old('console_id') == $console->id ? 'select' : '' }}>
                                {{ $console->name }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('console_id'))
                        <label class="game-label-error">{{ $errors->first('console_id') }}</label>
                    @endif
                </div>

                {{-- Genre --}}
                <div class="game-select-field flex-column fs-4 text-white my-3">
                    <label for="genre" class="select-text">Genero</label>
                    <select name="genre_id" id="genre" class="px-2">
                        <option class="option" style="background: #121212" value="">Selecione o genero do jogo
                        </option>
                        @foreach ($genres as $genre)
                            <option class="option" value="{{ $genre->id }}"
                                {{ old('genre_id') == $genre->id ? 'select' : '' }}>
                                {{ $genre->name }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('genre_id'))
                        <label class="game-label-error">{{ $errors->first('genre_id') }}</label>
                    @endif
                </div>

                {{-- Types --}}
                <div class="game-select-field flex-column fs-4 text-white my-3">
                    <label for="type" class="select-text">Subgeneros</label>
                    <select name="type_id" id="type" class="px-2">
                        <option class="option" style="background: #121212" value="">Selecione o Subgenero do jogo
                        </option>
                        @foreach ($types as $type)
                            <option class="option" value="{{ $type->id }}"
                                {{ old('type_id') == $type->id ? 'select' : '' }}>
                                {{ $type->name }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('type_id'))
                        <label class="game-label-error">{{ $errors->first('type_id') }}</label>
                    @endif
                </div>

                {{-- Date --}}
                <div class="game-input-field flex-column fs-4 text-white my-3">
                    <label for="date" class="input-text">Quando foi zerado</label>
                    <input type="date" id="date" class='px-2' placeholder="Data em que o jogo foi zerado" name="date" value="{{ old('date') }}">
                    @if ($errors->has('date'))
                        <label class="game-label-error">{{ $errors->first('date') }}</label>
                    @endif
                </div>

                {{-- Time --}}
                <div class="game-input-field flex-column fs-4 text-white my-3">
                    <label for="time" class="select-text">Quanto tempo levou?</label>
                    <input type="text" id="time" class='px-2' placeholder="Quantas horas para zerar o game" step='2' name="time" value="{{ old('time') }}">
                    @if ($errors->has('time'))
                        <label class="game-label-error">{{ $errors->first('time') }}</label>
                    @endif
                </div>

                {{-- Score --}}
                <div class="game-select-field flex-column fs-4 text-white my-3">
                    <label for="score" class="select-text">Pontuação</label>
                    <select name="score_id" id="score" class="px-2">
                        <option class="option" style="background: #121212" value="">Qual pontuação você da para o
                            jogo?
                        </option>
                        @foreach ($scores as $score)
                            <option class="option"
                                value="{{ $type->id }}"{{ old('score_id') == $score->id ? 'select' : '' }}>
                                {{ $score->system }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('score_id'))
                        <label class="game-label-error">{{ $errors->first('score_id') }}</label>
                    @endif
                </div>

                @if ($errors->has('user_id'))
                    <label class="game-label-error fs-4">{{ $errors->first('user_id') }}</label>
                @endif

                {{-- Difficulty --}}
                <div class="game-select-field flex-column fs-4 text-white my-3">
                    <label for="difficulty" class="select-text">Dificuldade</label>
                    <select name="difficulty_id" id="difficulty" class="px-2">
                        <option class="option" style="background: #121212" value="">Qual a dificuldade do jogo?
                        </option>
                        @foreach ($difficulties as $difficulty)
                            <option class="option"
                                value="{{ $difficulty->id }}"{{ old('difficulty_id') == $difficulty->id ? 'select' : '' }}>
                                {{ $difficulty->system }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('difficulty_id'))
                        <label class="game-label-error">{{ $errors->first('difficulty_id') }}</label>
                    @endif
                </div>

                {{-- Condition --}}
                <div class="game-textarea-field flex-column fs-4 text-white my-3">
                    <label for="condition" class="textarea-text">Condição de zeramento</label>
                    <textarea name="condition" class="px-2 py-1" id="condition" cols="30" rows="10"
                        placeholder="Quais as condições de zeramento do game?"></textarea>

                    @if ($errors->has('difficulty_id'))
                        <label class="game-label-error">{{ $errors->first('difficulty_id') }}</label>
                    @endif
                </div>

                {{-- Cover --}}
                <div class="game-input-field flex-column fs-4 text-white my-3">
                    <label for="cover" class="select-text">Capa do jogo</label>
                    <input type="file" id="cover" name="cover" class='px-2' accept="image/png, image/jpg, image/jpeg, image/svg, image/webp">
                    @if ($errors->has('time'))
                        <label class="game-label-error">{{ $errors->first('cover') }}</label>
                    @endif
                </div>

                {{-- Preview --}}
                <div class="game-img">
                    <img id="game-img-preview">
                </div>

                @if ($errors->has('user_id'))
                    <label class="game-label-error fs-4">{{ $errors->first('user_id') }}</label>
                @endif

                {{-- Submit --}}
                <div class="game-button my-3">
                    <button class="main-bg-color text-white fw-medium fs-5 rounded" game="submit">Enviar</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('script-js')
    <script>
        $(document).ready(function() {
            $('#time').mask('00ZZZ:00:00', {
                translation: {
                    'Z': {
                        pattern: /[0-9]/,
                        optional: true
                    }
                }
            });
            $('#time').mask('0099:00:00');
        })
    </script>

    <script src="{{ asset('js/app/changeimg.js') }}" img-id='cover' img-class='game-img-preview'></script>
@endpush