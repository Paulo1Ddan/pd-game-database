@extends('layouts.app.layout')
@section('title', 'Consoles - Editar')

@push('style-css')
    <link rel="stylesheet" href="{{ asset('css/app/console/console.css') }}">
@endpush

@section('content')
    <div class="console default-layout">
        <h3 class="console-title text-white">Criar console</h3>

        <div class="console-container margin-center p-3 text-white rounded mt-5">
            <form action="{{ route('console.update', $console->id) }}" method="POST" class="console-form">
                @csrf
                @method('PATCH')

                {{-- Name --}}
                <div class="console-input-field flex-column fs-4 text-white my-3">
                    <label for="name" class="input-text">Console</label>
                    <input id="name" type="text" class='px-2' placeholder="RPG, Ação, Sobrevivencia"
                        name="name" value="{{ $console->name }}" autofocus>
                    @if ($errors->has('name'))
                        <label class="console-label-error">{{ $errors->first('name') }}</label>
                    @endif
                </div>

                {{-- Color --}}
                <div class="console-input-field flex-column fs-4 text-white my-3">
                    <label for="color" class="input-text">Cor do console</label>
                    <input id="color" type="color" class='px-2' name="color" value="{{ $console->color }}">
                    @if ($errors->has('color'))
                        <label class="console-label-error">{{ $errors->first('color') }}</label>
                    @endif
                </div>

                @if ($errors->has('user_id'))
                    <label class="console-label-error fs-4">{{ $errors->first('user_id') }}</label>
                @endif

                {{-- Submit --}}
                <div class="console-button my-3">
                    <button class="main-bg-color text-white fw-medium fs-5 rounded" type="submit">Enviar</button>
                </div>

            </form>

            <hr>
            <h3>Alterar imagem</h3>

            <form action="{{ route('console.update.img', $console->id) }}" method="POST" enctype="multipart/form-data"
                class="console-form">
                @csrf
                @method('PATCH')

                {{-- Img --}}
                <div class="console-input-field flex-column fs-4 text-white my-3">
                    <label for="img" class="input-text">Imagem</label>
                    <input id="img" accept="image/png,image/jpg,image/jpeg,image/webp" type="file" class='px-2'
                        name="img">
                    @if ($errors->has('img'))
                        <label class="console-label-error">{{ $errors->first('img') }}</label>
                    @endif
                </div>

                {{-- Preview --}}
                <div class="console-img">
                    <img src="{{ asset('storage/' . $console->img) }}" alt="{{ $console->name }}" id="console-img-preview">
                </div>

                {{-- Submit --}}
                <div class="console-button my-3">
                    <button class="main-bg-color text-white fw-medium fs-5 rounded" type="submit">Enviar</button>
                </div>

            </form>

            <hr>

            <form action="{{ route('console.destroy', $console->id) }}" class="console-form" method="POST">
                @csrf
                @method('DELETE')
                {{-- Delete --}}
                <div class="console-button delete my-3">
                    <button class="delete-bg-color text-white fw-medium fs-5 rounded" type="submit">Deletar</button>
                </div>
            </form>
        </div>
    </div>
@endsection
@push('script-js')
    <script src="{{ asset('js/app/changeimg.js') }}" img-id='img' img-class='console-img-preview'></script>
@endpush