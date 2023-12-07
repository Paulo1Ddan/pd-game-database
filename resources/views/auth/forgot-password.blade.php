@extends('layouts.site.layout')
@section('title', 'Esqueci minha senha')
@push('style-css')
    <link rel="stylesheet" href="{{ asset('css/site/forgot-reset.css') }}">
@endpush


@section('content')

    <div class="forgot-container full-height full-weight flex-full-center">

        <div class="forgot-box p-2">

            <div class="forgot-text fs-5 text-white">
                Esqueceu sua senha? Sem problemas. Basta inserir seu email para enviarmos um link de redefinição de senha.
            </div>

            <form action="{{ route('password.email') }}" method="post" class="forgot-form full-width">
                @csrf

                {{-- Email --}}
                <div class="forgot-input-field flex-column fs-4 text-white my-3">
                    <label for="email" class="input-text">Email</label>
                    <input id="email" type="text" class='px-2' name="email" value="{{ old('email') }}"
                        autofocus>
                    @if ($errors->has('email'))
                        <label class="forgot-label-error">{{ $errors->get('email') }}</label>
                    @endif

                    @if(session('status'))

                    <label class="forgot-label-error">{{ session('status') }}</label>

                    @endif
                </div>

                {{-- Submit --}}
                <div class="forgot-button my-3">
                    <button class="main-bg-color text-white fw-medium fs-5 rounded" type="submit">Enviar</button>
                </div>
            </form>
        </div>

    </div>

@endsection


{{-- <x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
