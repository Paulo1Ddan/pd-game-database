@extends('layouts.app.layout')
@section('title', 'Generos - Criar')

@push('style-css')
    <link rel="stylesheet" href="{{ asset('css/app/genre/genre.css') }}">
@endpush

@section('content')
    <div class="genre default-layout">
        <h3 class="genre-title text-white">Cadastrar genero</h3>

        <div class="genre-container margin-center p-3 text-white rounded mt-5">
            <form action="{{ route('genre.store') }}" method="POST" class="genre-form">
                @csrf

                {{-- Name --}}
                <div class="genre-input-field flex-column fs-4 text-white my-3">
                    <label for="name" class="input-text">Genero</label>
                    <input id="name" type="text" class='px-2' placeholder="RPG, Ação, Sobrevivencia" name="name" value="{{ old('name') }}" autofocus>
                    @if ($errors->has('name'))
                        <label class="genre-label-error">{{ $errors->first('name') }}</label>
                    @endif
                </div>

                @if ($errors->has('user_id'))
                    <label class="genre-label-error fs-4">{{ $errors->first('user_id') }}</label>
                @endif


                {{-- Submit --}}
                <div class="genre-button my-3">
                    <button class="main-bg-color text-white fw-medium fs-5 rounded" type="submit">Enviar</button>
                </div>
            </form>
        </div>
    </div>
@endsection
