@extends('layouts.site.layout')
@section('title', 'Cadastrar')

@push('style-css')
    <link rel="stylesheet" href="{{ asset('css/site/main.css') }}">
@endpush

@section('content')

    <div class="auth-container full-height full-width flex-full-center">
        <div class="auth-box mt-5">

            {{-- Form Login Title --}}
            <div class="auth-title text-center p-3">
                <h3>Cadastro</h3>
            </div>

            <form action="{{ route('register') }}" method="post" class="auth-form flex-column full-width p-3">
                {{-- CSRF --}}
                @csrf

                {{-- Name --}}
                <div class="auth-input-field flex-column fs-4 text-white my-3">
                    <label for="name" class="input-text">Nome</label>
                    <input id="name" type="text" class='px-2' name="name" value="{{ old('name') }}" autofocus>
                    @if ($errors->has('name'))
                        <label class="auth-label-error">{{ $errors->first('name') }}</label>
                    @endif
                </div>

                {{-- Lastnanme --}}
                <div class="auth-input-field flex-column fs-4 text-white my-3">
                    <label for="lastname" class="input-text">Sobreome</label>
                    <input id="lastname" type="text" class='px-2' name="lastname" value="{{ old('lastname') }}" autofocus>
                    @if ($errors->has('lastname'))
                        <label class="auth-label-error">{{ $errors->first('lastname') }}</label>
                    @endif
                </div>

                {{-- E-mail --}}
                <div class="auth-input-field flex-column fs-4 text-white my-3">
                    <label for="email" class="input-text">Email</label>
                    <input id="email" type="text" class='px-2' name="email" value="{{ old('email') }}" autofocus>
                    @if ($errors->has('email'))
                        <label class="auth-label-error">{{ $errors->first('email') }}</label>
                    @endif
                </div>

                {{-- Password --}}
                <div class="auth-input-field flex-column fs-4 text-white my-3">
                    <label for="password" class="input-text">Senha</label>
                    <input id="password" type="password" class='px-2' name="password">
                    @if ($errors->has('password'))
                        <label class="auth-label-error">{{ $errors->first('password') }}</label>
                    @endif
                </div>

                {{--Confirm Password --}}
                <div class="auth-input-field flex-column fs-4 text-white my-3">
                    <label for="password_confirmation" class="input-text">Confirmar Senha</label>
                    <input id="password_confirmation" type="password" class='px-2' name="password_confirmation">
                    @if ($errors->has('password_confirmation'))
                        <label class="auth-label-error">{{ $errors->first('password_confirmation') }}</label>
                    @endif
                </div>
                
                {{-- Login --}}
                <div class="auth-new">
                    <a href="{{ route('login') }}">Ja possui uma conta? Entre aqui</a>
                </div>

                {{-- Submit --}}
                <div class="auth-button my-3">
                    <button class="main-bg-color text-white fw-medium fs-5 rounded" type="submit">Cadastrar</button>
                </div>
            </form>
        </div>
    </div>

@endsection
