@extends('layouts.site.layout')
@section('title', 'Login')

@push('style-css')
    <link rel="stylesheet" href="{{ asset('css/site/main.css') }}">
@endpush

@section('content')

    <div class="auth-container full-height full-width flex-full-center">
        <div class="auth-box mt-5">

            {{-- Form Login Title --}}
            <div class="auth-title text-center p-3">
                <h3>Login</h3>
            </div>

            <form action="{{ route('index.login') }}" method="post" class="auth-form flex-column full-width p-3">
                {{-- CSRF --}}
                @csrf

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
                
                <div class="auth-remember-forgot flex-between-center flex-wrap">
                    {{-- Remember-me --}}
                    <div class="auth-check-field fs-4 text-white my-3">
                        <input id='remember_me' type="checkbox" class='px-2' name="remember">
                        <label for='remember_me' class="check-text">Lembrar de mim</label>
                    </div>

                    {{-- Forgot Password --}}
                    <div class="auth-forgot">
                        <a href="{{ route('password.request') }}">Esqueci minha senha</a>
                    </div>
                </div>

                {{-- New User --}}
                <div class="auth-new">
                    <a href="{{ route('register') }}">Novo por aqui? Cadastre-se</a>
                </div>

                {{-- Submit --}}
                <div class="auth-button my-3">
                    <button class="main-bg-color text-white fw-medium fs-5 rounded" type="submit">Entrar</button>
                </div>
            </form>
        </div>
    </div>

@endsection
