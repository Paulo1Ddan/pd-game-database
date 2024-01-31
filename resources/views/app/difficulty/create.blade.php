@extends('layouts.app.layout')
@section('title', 'Dificuldades - Criar')

@push('style-css')
    <link rel="stylesheet" href="{{ asset('css/app/difficulty/difficulty.css') }}">
@endpush

@section('content')
    <div class="difficulty default-layout">
        <h3 class="difficulty-title text-white">Criar dificuldade</h3>

        <div class="difficulty-container margin-center p-3 text-white rounded mt-5">
            <form action="{{ route('difficulty.store') }}" method="POST" class="difficulty-form">
                @csrf

                {{-- System --}}
                <div class="difficulty-input-field flex-column fs-4 text-white my-3">
                    <label for="system" class="input-text">Sistema de dificuldade</label>
                    <input id="system" type="text" class='px-2' placeholder="Ex.: AAA, B, 1, 2, 3" name="system" value="{{ old('system') }}" autofocus>
                    @if ($errors->has('system'))
                        <label class="difficulty-label-error">{{ $errors->first('system') }}</label>
                    @endif
                </div>

                {{-- Description --}}
                <div class="difficulty-input-field flex-column fs-4 text-white my-3">
                    <label for="description" class="input-text">Descrição</label>
                    <input id="description" type="text" placeholder="Ex.: Muito dificil, Médio, Facil" class='px-2'
                        name="description" value="{{ old('description') }}">
                    @if ($errors->has('description'))
                        <label class="difficulty-label-error">{{ $errors->first('description') }}</label>
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
        </div>
    </div>
@endsection
