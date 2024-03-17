@extends('layouts.app.layout')
@section('title', 'Subgeneros - Criar')

@push('style-css')
    <link rel="stylesheet" href="{{ asset('css/app/types/types.css') }}">
@endpush

@section('content')
    <div class="type default-layout">
        <h3 class="type-title text-white">Criar dificuldade</h3>

        <div class="type-container margin-center p-3 text-white rounded mt-5">
            <form action="{{ route('types.update', $type->id) }}" method="POST" class="gd-form">
                @csrf
                @method('put')

                {{-- Genre --}}
                @include('app.partials.forms.select', [
                    'label' => 'Gênero',
                    'name' => 'genre_id',
                    'options' => $genres,
                    'selected' => old("genre_id") ? old("genre_id") : $type->genre_id,
                    'name_type' => 'name',
                    'errors' => $errors->has('genre_id') ? $errors->first('genre_id') : null, 
                ])

                {{-- Type --}}
                @include('app.partials.forms.input', [
                    "label" => "Subgênero",
                    "name" => "name",
                    "placeholder" => "Ex.: Soulslike, Hack n' Slash, Metroidvania",
                    "value" => old("name") ? old("name") : $type->name,
                    "input_type" => "text",
                    "autofocus" => false,
                    "errors" => $errors->has('name') ? $errors->first('name') : null
                ])

                @if ($errors->has('user_id'))
                    <label class="type-label-error fs-4">{{ $errors->first('user_id') }}</label>
                @endif

                {{-- Submit --}}
                <div class="gd-button my-3">
                    <button class="main-bg-color text-white fw-medium fs-5 rounded" type="submit">Enviar</button>
                </div>
            </form>

            <form action="{{ route('types.destroy', $type->id) }}" class="gd-form" method="POST">
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