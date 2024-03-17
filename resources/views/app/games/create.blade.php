@extends('layouts.app.layout')
@section('title', 'Subgeneros - Criar')

@push('style-css')
    <link rel="stylesheet" href="{{ asset('css/app/game/game.css') }}">
@endpush

@section('content')
    <div class="game default-layout">
        <h3 class="game-title text-white">Cadastrar jogo</h3>

        <div class="game-container margin-center p-3 text-white rounded mt-5">
            <form action="{{ route('game.store') }}" method="POST" enctype="multipart/form-data" class="gd-form">
                @csrf

                {{-- Game --}}
                @include('app.partials.forms.input', [
                    'label' => 'Nome do jogo',
                    'name' => 'name',
                    'placeholder' => 'Ex.: Super Mario 64',
                    'value' => old('name'),
                    'input_type' => 'text',
                    'autofocus' => true,
                    'errors' => $errors->has('name') ? $errors->first('name') : null,
                ])

                {{-- Console --}}
                @include('app.partials.forms.select', [
                    'label' => 'Console',
                    'name' => 'console_id',
                    'options' => $consoles,
                    'selected' => old('console_id'),
                    'name_type' => 'name',
                    'errors' => $errors->has('console_id') ? $errors->first('console_id') : null,
                ])


                {{-- Genre --}}
                @include('app.partials.forms.select', [
                    'label' => 'Gênero',
                    'name' => 'genre_id',
                    'options' => $genres,
                    'selected' => old('genre_id'),
                    'name_type' => 'name',
                    'errors' => $errors->has('genre_id') ? $errors->first('genre_id') : null,
                ])

                {{-- Types --}}
                @include('app.partials.forms.select', [
                    'label' => 'Subgênero',
                    'name' => 'type_id',
                    'options' => $types,
                    'selected' => old('type_id'),
                    'name_type' => 'name',
                    'errors' => $errors->has('type_id') ? $errors->first('type_id') : null,
                ])

                {{-- Date --}}
                @include('app.partials.forms.input', [
                    'label' => 'Data em que o jogo foi zerado',
                    'name' => 'date',
                    'placeholder' => 'Ex.: 22/03/2023',
                    'value' => old('date'),
                    'input_type' => 'date',
                    'errors' => $errors->has('date') ? $errors->first('date') : null,
                ])

                {{-- Time --}}
                @include('app.partials.forms.input', [
                    'label' => 'Quantas hora para zerar',
                    'name' => 'time',
                    'placeholder' => 'Ex.: 10h',
                    'value' => old('time'),
                    'input_type' => 'text',
                    'errors' => $errors->has('time') ? $errors->first('time') : null,
                ])

                {{-- Score --}}
                @include('app.partials.forms.select', [
                    'label' => 'Pontuação',
                    'name' => 'score_id',
                    'options' => $scores,
                    'selected' => old('score_id'),
                    'name_type' => 'system',
                    'errors' => $errors->has('score_id') ? $errors->first('score_id') : null,
                ])

                {{-- Difficulty --}}
                @include('app.partials.forms.select', [
                    'label' => 'Dificuldade',
                    'name' => 'difficulty_id',
                    'options' => $difficulties,
                    'selected' => old('difficulty_id'),
                    'name_type' => 'system',
                    'errors' => $errors->has('difficulty_id') ? $errors->first('difficulty_id') : null,
                ])

                {{-- Condition --}}
                @include('app.partials.forms.textarea', [
                    'label' => 'Condição para zerar',
                    'name' => 'condition',
                    'placeholder' => 'Ex: Derrotar o ultimo boss',
                    'value' => old('condition'),
                    'errors' => $errors->has('condition') ? $errors->first('condition') : null,
                ])

                {{-- Cover --}}
                @include('app.partials.forms.input', [
                    'label' => 'Capa do jogo',
                    'name' => 'cover',
                    'input_type' => 'file',
                    'accept' => 'image/png, image/jpg, image/jpeg, image/svg, image/webp',
                    'errors' => $errors->has('cover') ? $errors->first('cover') : null,
                ])

                {{-- Preview --}}
                <div class="gd-img">
                    <img id="gd-img-preview">
                </div>

                @if ($errors->has('user_id'))
                    <label class="gd-label-error fs-4">{{ $errors->first('user_id') }}</label>
                @endif

                {{-- Submit --}}
                <div class="gd-button my-3">
                    <button class="main-bg-color text-white fw-medium fs-5 rounded" game="submit">Enviar</button>
                </div>


                @if ($errors->has('user_id'))
                    <label class="gd-label-error fs-4">{{ $errors->first('user_id') }}</label>
                @endif
            </form>
        </div>
    </div>
@endsection

@push('script-js')
    <script src="{{ asset('js/app/changeimg.js') }}" img-id='cover' img-class='gd-img-preview'></script>
@endpush
