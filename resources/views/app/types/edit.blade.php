@extends('layouts.app.layout')
@section('title', 'Subgeneros - Criar')

@push('style-css')
    <link rel="stylesheet" href="{{ asset('css/app/types/types.css') }}">
@endpush

@section('content')
    <div class="type default-layout">
        <h3 class="type-title text-white">Criar dificuldade</h3>

        <div class="type-container margin-center p-3 text-white rounded mt-5">
            <form action="{{ route('types.update', $type->id) }}" method="POST" class="type-form">
                @csrf
                @method('put')

                {{-- Genre --}}
                <div class="type-select-field flex-column fs-4 text-white my-3">
                    <label for="genre" class="select-text">Genero</label>
                    <select name="genre_id" id="genre" class="px-2">
                        <option class="option" style="background: #121212" value="">Selecione o genero do jogo
                        </option>
                        @foreach ($genres as $genre)
                            <option class="option" value="{{ $genre->id }}"
                                {{ ($type->genre_id ?? old('genre_id')) == $genre->id ? 'selected' : '' }}>
                                {{ $genre->name }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('genre_id'))
                        <label class="type-label-error">{{ $errors->first('genre_id') }}</label>
                    @endif
                </div>

                {{-- Type --}}
                <div class="type-input-field flex-column fs-4 text-white my-3">
                    <label for="name" class="input-text">Subgenero</label>
                    <input id="name" type="text" class='px-2'
                        placeholder="Ex.: Soulslike, Hack n' Slash, Metroidvania" name="name"
                        value="{{ old('name') == '' ? $type->name : old('name') }}" autofocus>
                    @if ($errors->has('name'))
                        <label class="type-label-error">{{ $errors->first('name') }}</label>
                    @endif
                </div>

                @if ($errors->has('user_id'))
                    <label class="type-label-error fs-4">{{ $errors->first('user_id') }}</label>
                @endif

                {{-- Submit --}}
                <div class="type-button my-3">
                    <button class="main-bg-color text-white fw-medium fs-5 rounded" type="submit">Enviar</button>
                </div>
            </form>

            <form action="{{ route('types.destroy', $type->id) }}" class="type-form" method="POST">
                @csrf
                @method('DELETE')
                {{-- Delete --}}
                <div class="type-button delete my-3">
                    <button class="delete-bg-color text-white fw-medium fs-5 rounded" type="submit">Deletar</button>
                </div>
            </form>
        </div>
    </div>
@endsection