@extends('layouts.app.layout')
@section('title', 'Pontuação - Editar')

@push('style-css')
    <link rel="stylesheet" href="{{ asset('css/app/genre/genre.css') }}">
@endpush

@section('content')
    <div class="genre default-layout">
        <h3 class="genre-title text-white">Criar dificuldade</h3>

        <div class="genre-container margin-center p-3 text-white rounded mt-5">
            <form action="{{ route('genre.update', $genre->id ) }}" method="POST" class="genre-form">
                @csrf
                @method('PUT')

                {{-- Name --}}
                <div class="genre-input-field flex-column fs-4 text-white my-3">
                    <label for="name" class="input-text">Genero</label>
                    <input id="name" type="text" class='px-2' placeholder="RPG, Ação, Sobrevivencia" name="name" value="{{ $genre->name }}" autofocus>
                    @if ($errors->has('name'))
                        <label class="genre-label-error">{{ $errors->first('name') }}</label>
                    @endif
                </div>

                {{-- Color --}}
                <div class="genre-input-field flex-column fs-4 text-white my-3">
                    <label for="color" class="input-text">Cor da pontuação</label>
                    <input id="color" type="color" class='px-2' name="color" value="{{ $genre->color }}">
                    @if ($errors->has('color'))
                        <label class="genre-label-error">{{ $errors->first('color') }}</label>
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
            <form action="{{ route('genre.destroy', $genre->id) }}" class="genre-form" method="POST">
                @csrf
                @method('DELETE')
                {{-- Delete --}}
                <div class="genre-button delete my-3">
                    <button class="delete-bg-color text-white fw-medium fs-5 rounded" type="submit">Deletar</button>
                </div>
            </form>
        </div>
    </div>
@endsection