@extends('layouts.app.layout')
@section('title', 'Subgeneros - Inicio')

@push('style-css')
    <link rel="stylesheet" href="{{ asset('css/app/types/index.css') }}">
@endpush

@section('content')
    <div class="type default-layout">
        <h3 class="type-title text-white">Subgeneros</h3>
        <p class="type-text text-white fs-5">Gerencie os subgeneros dos jogos que você ja zerou. Caso tenha dúvidas sobre
            qual o subgenero do jogo, é possivel descobrir-lo por meio das principais lojas online de jogos</p>

        <div class="type-container p-3 text-white rounded mt-3">

            <div class="title-create flex-between-center">
                <h3>Subgeneros</h3>
                <a href="{{ route('types.create') }}"
                    class="type-create-button main-bg-color rounded flex-full-center fs-6">Criar subgenero</a>
            </div>
            @if (count($types) > 0)
                <div class="table-responsive">
                    <table class="table type-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Subgenero</th>
                                <th>Genero</th>
                                <th>Cor</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($types as $type)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td><a href="{{ route('types.edit', $type->id) }}"
                                            class="fw-bold">{{ $type->name }}</a></td>
                                    <td><a href="{{ route('genre.edit', $type->genre->id) }}"
                                            class="fw-bold">{{ $type->genre->name }}</a></td>
                                    <td>{{ $type->genre->color }} <span class="color"
                                            style="background: {{ $type->genre->color }}"></span></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <h3 class="text-center">Não há subgeneros cadastrados</h3>
            @endif
        </div>
    </div>
@endsection

