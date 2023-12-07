@extends('layouts.site.layout')
@section('title', 'Validar email')
@push('style-css')
    <link rel="stylesheet" href="{{ asset('css/site/user-validation.css') }}">
@endpush


@section('content')

    <div class="user-validation-container full-height full-weight flex-full-center">
        <div class="user-validation-box full-width p-2">
            <div class="box-header flex-vertical-center top-radius text-white fs-4">
                <p>Validação de email do usuario</p>
            </div>
            <div class="box-body py-2 text-white fs-5">
                Enviamos um email com um link de validação de sua conta. Caso não tenha recebido, clique no botão abaixo para enviar novamente
            </div>
            <div class="box-footer py-2 text-white fs-5">
                <form method="post" action="{{ route('verification.send') }}">
                    @csrf

                    <button type="submit" class="full-width main-bg-color text-white rounded fw-medium">Reenviar email de validação</button>
                </form>
            </div>
        </div>
    </div>

@endsection