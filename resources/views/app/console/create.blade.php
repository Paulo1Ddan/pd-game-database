@extends('layouts.app.layout')
@section('title', 'Consoles - Criar')

@push('style-css')
    <link rel="stylesheet" href="{{ asset('css/app/console/console.css') }}">
@endpush

@section('content')
    <div class="console default-layout">
        <h3 class="console-title text-white">Criar console</h3>

        <div class="console-container margin-center p-3 text-white rounded mt-5">
            <form action="{{ route('console.store') }}" method="POST" enctype="multipart/form-data" class="console-form">
                @csrf

                {{-- Name --}}
                <div class="console-input-field flex-column fs-4 text-white my-3">
                    <label for="name" class="input-text">Console</label>
                    <input id="name" type="text" class='px-2' placeholder="Ex.: Snes, PS1, Mega Drive" name="name" value="{{ old('name') }}" autofocus>
                    @if ($errors->has('name'))
                        <label class="console-label-error">{{ $errors->first('name') }}</label>
                    @endif
                </div>

                {{-- Color --}}
                <div class="console-input-field flex-column fs-4 text-white my-3">
                    <label for="color" class="input-text">Cor do console</label>
                    <input id="color" type="color" class='px-2' name="color" value="{{ old('color') }}">
                    @if ($errors->has('color'))
                        <label class="console-label-error">{{ $errors->first('color') }}</label>
                    @endif
                </div>

                {{-- Img --}}
                <div class="console-input-field flex-column fs-4 text-white my-3">
                    <label for="img" class="input-text">Imagem</label>
                    <input id="img" accept="image/png,image/jpg,image/jpeg,image/webp" type="file" class='px-2' name="img">
                    @if ($errors->has('img'))
                        <label class="console-label-error">{{ $errors->first('img') }}</label>
                    @endif
                </div>

                {{-- Preview --}}
                <div class="console-img">
                    <img id="console-img-preview">
                </div>

                {{-- Submit --}}
                <div class="console-button my-3">
                    <button class="main-bg-color text-white fw-medium fs-5 rounded" type="submit">Enviar</button>
                </div>
            </form>
        </div>
    </div>
@endsection
@push('script-js')
    <script src="{{ asset('js/app/changeimg.js') }}" img-id='img' img-class='console-img-preview'></script>
@endpush