@extends('layouts.app.layout')
@section('title', 'Subgeneros - Criar')

@push('style-css')
    <link rel="stylesheet" href="{{ asset('css/app/types/types.css') }}">
@endpush

@section('content')
    <div class="type default-layout">
        <h3 class="type-title text-white">Criar dificuldade</h3>

        <div class="type-container margin-center p-3 text-white rounded mt-5">
            <form action="{{ route('types.store') }}" method="POST" class="type-form">
                @csrf

                {{-- genre --}}
                <div class="type-select-field flex-column fs-4 text-white my-3">
                    <label for="genre" class="select-text">Genero</label>
                    <select name="genre_id" id="genre" class="px-2">
                        <option class="option" style="background: #121212" value="">Selecione o genero do jogo
                        </option>
                        @foreach ($genres as $genre)
                            <option class="option" value="{{ $genre->id }}"
                                {{ old('genre_id') == $genre->id ? 'select' : '' }} style="background: {{ $genre->color }}">
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
                    <input id="name" type="text" class='px-2' placeholder="Ex.: Soulslike, Hack n' Slash, Metroidvania" name="name"
                        value="{{ old('name') }}" autofocus>
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
        </div>
    </div>
@endsection

@push('script-js')
    <script>
        var rgbArray = [];
        var rgbFinal = [];

        $('.option').each(function() {
            var backgroundColor = $(this).css('backgroundColor');
            rgbArray.push(backgroundColor);
        });

        for (let i = 0; i < rgbArray.length; i++) {

            var colors = rgbArray[i].match(/^rgb\((\d+),\s*(\d+),\s*(\d+)\)$/);

            let brightness = Math.round(((parseInt(colors[1]) * 299) + (parseInt(colors[2]) * 587) + (parseInt(colors[3]) *
                114)) / 1000);
            rgbFinal.push((brightness > 175) ? 'black' : 'white')
        }

        $('.option').each(function(i) {
            $(this).css('color', rgbFinal[i]);
        });
    </script>
@endpush
