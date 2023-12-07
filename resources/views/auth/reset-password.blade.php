@extends('layouts.site.layout')
@section('title', 'Esqueci minha senha')
@push('style-css')
    <link rel="stylesheet" href="{{ asset('css/site/forgot-reset.css') }}">
@endpush

@section('content')

    <div class="reset-container full-height full-weight flex-full-center">

        <div class="reset-box p-2">

            <div class="reset-text text-center text-white">
                <h3>Redefinir senha</h3>
            </div>

            <form action="{{ route('password.store') }}" method="post" class="reset-form full-width">
                @csrf

                {{-- Reset Password Token --}}
                <input type="hidden" name="token" value="{{ $request->route('token') }}">\

                {{-- Password --}}
                <div class="reset-input-field flex-column fs-4 text-white my-3">
                    <label for="password" class="input-text">Senha</label>
                    <input id="password" type="password" class='px-2' name="password">
                    @if ($errors->has('password'))
                        <label class="reset-label-error">{{ $errors->first('password') }}</label>
                    @endif
                </div>

                {{-- Confirm Password --}}
                <div class="reset-input-field flex-column fs-4 text-white my-3">
                    <label for="password_confirmation" class="input-text">Confirmar Senha</label>
                    <input id="password_confirmation" type="password" class='px-2' name="password_confirmation">
                    @if ($errors->has('password_confirmation'))
                        <label class="reset-label-error">{{ $errors->first('password_confirmation') }}</label>
                    @endif
                </div>

                {{-- Email --}}
                
                    @if ($errors->has('email'))
                    <div class="forgot-input-field flex-column fs-4 text-white my-3">
                        <label class="forgot-label-error">Erro ao atualizar a senha. Email pode estar incorreto</label>
                    </div>
                    @endif
                
                {{-- Submit --}}
                <div class="reset-button my-3">
                    <button class="main-bg-color text-white fw-medium fs-5 rounded" type="submit">Enviar</button>
                </div>
            </form>
        </div>

    </div>

@endsection


{{-- <x-guest-layout>
    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Reset Password') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
