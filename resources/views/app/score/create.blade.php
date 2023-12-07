@extends('layouts.app.layout')
@section('title', 'Pontuação - Criar')

@push('style-css')
    <link rel="stylesheet" href="{{ asset('css/app/score/score.css') }}">
@endpush

@section('content')
    <div class="score default-layout">
        <h3 class="score-title text-white">Criar dificuldade</h3>

        <div class="score-container margin-center p-3 text-white rounded mt-5">
            <form action="{{ route('score.store') }}" method="POST" class="score-form">
                @csrf

                {{-- System --}}
                <div class="score-input-field flex-column fs-4 text-white my-3">
                    <label for="system" class="input-text">Sistema de pontuação</label>
                    <input id="system" type="text" class='px-2' placeholder="Ex.: AAA, B, 1, 2, 3" name="system" value="{{ old('system') }}" autofocus>
                    @if ($errors->has('system'))
                        <label class="score-label-error">{{ $errors->first('system') }}</label>
                    @endif
                </div>

                {{-- Description --}}
                <div class="score-input-field flex-column fs-4 text-white my-3">
                    <label for="description" class="input-text">Descrição</label>
                    <input id="description" type="text" placeholder="Ex.: Bom, médio, ruim" class='px-2'
                        name="description" value="{{ old('description') }}">
                    @if ($errors->has('description'))
                        <label class="score-label-error">{{ $errors->first('description') }}</label>
                    @endif
                </div>

                {{-- Color --}}
                <div class="score-input-field flex-column fs-4 text-white my-3">
                    <label for="color" class="input-text">Cor da pontuação</label>
                    <input id="color" type="color" class='px-2' name="color" value="{{ old('color') }}">
                    @if ($errors->has('color'))
                        <label class="score-label-error">{{ $errors->first('color') }}</label>
                    @endif
                </div>

                @if ($errors->has('user_id'))
                    <label class="score-label-error fs-4">{{ $errors->first('user_id') }}</label>
                @endif


                {{-- Submit --}}
                <div class="score-button my-3">
                    <button class="main-bg-color text-white fw-medium fs-5 rounded" type="submit">Enviar</button>
                </div>
            </form>
        </div>
    </div>
@endsection
