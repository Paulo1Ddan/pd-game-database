@extends('layouts.app.layout')
@section('title', 'Ações')

@push('style-css')
    <link rel="stylesheet" href="{{ asset('css/app/actions/actions.css') }}">
@endpush

@section('content')

<div class="actions px-3 default-layout">
    <h3 class="actions-text text-white">Ações</h3>

    <div class="row g-4 mt-2">
        <div class="col-lg-6 col-sm-12">
            <a href="#" class="action d-flex full-height full-width">
                <div class="action-text full-heigth flex-vertical-center p-4">
                    <h4>Jogos</h4>
                </div>
                <div class="action-img games p-3 full-height"></div>
            </a>
        </div>
        <div class="col-lg-6 col-sm-12">
            <a href="{{ route('console.index') }}" class="action d-flex full-height full-width">
                <div class="action-text full-heigth flex-vertical-center p-4">
                    <h4>Consoles</h4>
                </div>
                <div class="action-img console p-3 full-height"></div>
            </a>
        </div>
        <div class="col-lg-6 col-sm-12">
            <a href="{{ route('genre.index') }}" class="action d-flex full-height full-width">
                <div class="action-text full-heigth flex-vertical-center p-4">
                    <h4>Generos</h4>
                </div>
                <div class="action-img genres p-3 full-height"></div>
            </a>
        </div>
        <div class="col-lg-6 col-sm-12">
            <a href="{{ route('types.index') }}" class="action d-flex full-height full-width">
                <div class="action-text full-heigth flex-vertical-center p-4">
                    <h4>Subgeneros</h4>
                </div>
                <div class="action-img types p-3 full-height"></div>
            </a>
        </div>
        <div class="col-lg-6 col-sm-12">
            <a href="#" class="action d-flex full-height full-width">
                <div class="action-text full-heigth flex-vertical-center p-4">
                    <h4>Conquistas</h4>
                </div>
                <div class="action-img achievements p-3 full-height"></div>
            </a>
        </div>
        <div class="col-lg-6 col-sm-12">
            <a href="{{ route('score.index') }}" class="action d-flex full-height full-width">
                <div class="action-text full-heigth flex-vertical-center p-4">
                    <h4>Pontuação</h4>
                </div>
                <div class="action-img scores p-3 full-height"></div>
            </a>
        </div>
        <div class="col-lg-6 col-sm-12">
            <a href="{{ route('difficulty.index') }}" class="action d-flex full-height full-width">
                <div class="action-text full-heigth flex-vertical-center p-4">
                    <h4>Dificuldade</h4>
                </div>
                <div class="action-img difficulty p-3 full-height"></div>
            </a>
        </div>
    </div>
</div>

@endsection