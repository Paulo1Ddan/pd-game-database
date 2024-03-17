@extends('layouts.app.layout')
@section('title', 'Editar pontuação')

@push('style-css')
    <link rel="stylesheet" href="{{ asset('css/app/score/score.css') }}">
@endpush

@section('content')
    <div class="score default-layout">
        <h3 class="score-title text-white">Editar pontuação</h3>

        <div class="score-container margin-center p-3 text-white rounded mt-5">
            <form action="{{ route('score.update', $score->id) }}" method="POST" class="gd-form">
                @csrf
                @method('PUT')

                {{-- System --}}
                @include('app.partials.forms.input', [
                    'label' => 'Sistema de pontuação',
                    'name' => 'system',
                    'placeholder' => 'Ex.: Alfabético (A, B, C) ou Númerico (1, 2, 3)',
                    'value' => old('system') == '' ? $score->system : old('description'),
                    'input_type' => 'text',
                    'autofocus' => true,
                    'errors' => $errors->has('system') ? $errors->first('system') : null,
                ])

                {{-- Description --}}
                @include('app.partials.forms.input', [
                    'label' => 'Descrição',
                    'name' => 'description',
                    'placeholder' => 'Ex.: Muito bom, Médiano, Ruim etc.',
                    'value' => old('description') == '' ? $score->description : old('description'),
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
            <form action="{{ route('score.destroy', $score->id) }}" class="gd-form" method="POST">
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
