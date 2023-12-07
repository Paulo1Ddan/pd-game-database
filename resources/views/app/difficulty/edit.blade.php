@extends('layouts.app.layout')
@section('title', 'Dificuldades - Editar')

@push('style-css')
    <link rel="stylesheet" href="{{ asset('css/app/difficulty/difficulty.css') }}">
@endpush

@section('content')
    <div class="difficulty default-layout">
        <h3 class="difficulty-title text-white">Criar dificuldade</h3>

        <div class="difficulty-container margin-center p-3 text-white rounded mt-5">
            <form action="{{ route('difficulty.update', $difficulty->id ) }}" method="POST" class="difficulty-form">
                @csrf
                @method('PUT')

                {{-- System --}}
                <div class="difficulty-input-field flex-column fs-4 text-white my-3">
                    <label for="system" class="input-text">Sistema de dificuldade</label>
                    <input id="system" type="text" class='px-2' placeholder="Ex.: AAA, B, 1, 2, 3" name="system"
                        value="{{ $difficulty->system }}" autofocus>
                    @if ($errors->has('system'))
                        <label class="difficulty-label-error">{{ $errors->first('system') }}</label>
                    @endif
                </div>

                {{-- Description --}}
                <div class="difficulty-input-field flex-column fs-4 text-white my-3">
                    <label for="description" class="input-text">Descrição</label>
                    <input id="description" type="text" placeholder="Ex.: Muito dificil, Médio, Facil" class='px-2'
                        name="description" value="{{ $difficulty->description }}">
                    @if ($errors->has('description'))
                        <label class="difficulty-label-error">{{ $errors->first('description') }}</label>
                    @endif
                </div>

                {{-- Color --}}
                <div class="difficulty-input-field flex-column fs-4 text-white my-3">
                    <label for="color" class="input-text">Cor da dificuldade</label>
                    <input id="color" type="color" class='px-2' name="color" value="{{ $difficulty->color }}">
                    @if ($errors->has('color'))
                        <label class="difficulty-label-error">{{ $errors->first('color') }}</label>
                    @endif
                </div>

                @if ($errors->has('user_id'))
                    <label class="difficulty-label-error fs-4">{{ $errors->first('user_id') }}</label>
                @endif

                {{-- Submit --}}
                <div class="difficulty-button my-3">
                    <button class="main-bg-color text-white fw-medium fs-5 rounded" type="submit">Enviar</button>
                </div>

            </form> 
            <form action="{{ route('difficulty.destroy', $difficulty->id) }}" class="difficulty-form" method="POST">
                @csrf
                @method('DELETE')
                {{-- Delete --}}
                <div class="difficulty-button delete my-3">
                    <button class="delete-bg-color text-white fw-medium fs-5 rounded" type="submit">Deletar</button>
                </div>
            </form>
        </div>
    </div>
@endsection
