@extends('layouts.app.layout')
@section('title', 'Editar dificuldade')

@push('style-css')
    <link rel="stylesheet" href="{{ asset('css/app/difficulty/difficulty.css') }}">
@endpush

@section('content')
    <div class="difficulty default-layout">
        <h3 class="difficulty-title text-white">Editar dificuldade</h3>

        <div class="difficulty-container margin-center p-3 text-white rounded mt-5">
            <form action="{{ route('difficulty.update', $difficulty->id) }}" method="POST" class="gd-form">
                @csrf
                @method('PUT')

                {{-- System --}}
                @include('app.partials.forms.input', [
                    'label' => 'Sistema de dificuldade',
                    'name' => 'system',
                    'placeholder' => 'Ex.: Alfabético (A, B, C) ou Númerico (1, 2, 3)',
                    'value' => old('system') == '' ? $difficulty->system : old('system'),
                    'input_type' => 'text',
                    'autofocus' => true,
                    'errors' => $errors->has('system') ? $errors->first('system') : null,
                ])

                {{-- Description --}}
                @include('app.partials.forms.input', [
                    'label' => 'Descrição',
                    'name' => 'description',
                    'placeholder' => 'Ex.: Facil, Médio, Difícil etc.',
                    'value' => old('description') == '' ? $difficulty->description : old('description'),
                    'input_type' => 'text',
                    'autofocus' => true,
                    'errors' => $errors->has('description') ? $errors->first('description') : null,
                ])

                {{-- Submit --}}
                <div class="gd-button my-3">
                    <button class="main-bg-color text-white fw-medium fs-5 rounded" type="submit">Enviar</button>
                </div>

                @if ($errors->has('user_id'))
                    <label class="gd-label-error fs-4">{{ $errors->first('user_id') }}</label>
                @endif

            </form>
            <form action="{{ route('difficulty.destroy', $difficulty->id) }}" class="gd-form" method="POST">
                @csrf
                @method('DELETE')
                {{-- Delete --}}
                <div class="gd-button delete my-3">
                    <button class="delete-bg-color text-white fw-medium fs-5 rounded" type="submit">Deletar</button>
                </div>
            </form>
        </div>
    </div>
@endsection
