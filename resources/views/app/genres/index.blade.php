@extends('layouts.app.layout')
@section('title', 'Generos - Inicio')

@push('style-css')
    <link rel="stylesheet" href="{{ asset('css/app/genre/index.css') }}">
@endpush

@section('content')
    <div class="genre default-layout">
        <h3 class="genre-title text-white">Generos</h3>
        <p class="genre-text text-white fs-5">Gerencie os generos dos jogos que você quer catalogar. Caso tenha dificuldades em definir o genero</p>

        <div class="genre-container p-3 text-white rounded mt-3">

            <div class="title-create flex-between-center">
                <h3>Generos</h3>
                <a href="{{ route('genre.create') }}" class="genre-create-button main-bg-color rounded flex-full-center fs-6">Criar pontuação</a>
            </div>
            @if (count($genres) > 0)
                <div class="table-responsive">
                    <table class="table genre-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nome</th>
                                <th>Cor</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($genres as $genre)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td><a href="{{ route('genre.edit', $genre->id) }}" class="fw-bold">{{ $genre->name }}</a></td>
                                    <td>{{ $genre->color }} <span class="color" style="background: {{ $genre->color }}"></span></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <h3 class="text-center">Não há generos cadastrada</h3>
            @endif
        </div>
    </div>
@endsection
