@extends('layouts.app.layout')
@section('title', 'Jogos - Inicio')

@push('style-css')
    <link rel="stylesheet" href="{{ asset('css/app/game/index.css') }}">
@endpush

@section('content')
    <div class="game default-layout">
        <h3 class="game-title text-white">Jogos</h3>
        <p class="game-text text-white fs-5">Cadastre aqui os jogos que você zerou, definindo a data, console, dia e hora,
            genero e tipo do jogo</p>

        <div class="game-container p-3 text-white rounded mt-3">

            <div class="title-create flex-between-center">
                <h3>Jogos</h3>
                <a href="{{ route('game.create') }}"
                    class="game-create-button main-bg-color rounded flex-full-center fs-6">Criar game</a>
            </div>

            @if (count($games) > 0)
                <div class="table-responsive">
                    <table class="table game-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Jogo</th>
                                <th>Consoles</th>
                                <th>Genero</th>
                                <th>S. Genero</th>
                                <th>Pontuação</th>
                                <th>Dificuldade</th>
                                <th>Data</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($games as $game)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td><a href="{{ route('game.edit', $game->id) }}"
                                            class="fw-bold">{{ $game->name }}</a></td>
                                    <td>><a href="{{ route('console.edit', $game->console->id) }}"
                                            class="fw-bold">{{ $game->console->name }}</a></td>
                                    <td>><a href="{{ route('genre.edit', $game->genre->id) }}"
                                            class="fw-bold">{{ $game->genre->name }}</a></td>
                                    <td>><a href="{{ route('genre.edit', $game->genre->type->id) }}"
                                            class="fw-bold">{{ $game->genre->name }}</a></td>
                                    <td>><a href="{{ route('score.edit', $game->score->id) }}"
                                            class="fw-bold">{{ $game->score->name }}</a></td>
                                    <td>><a href="{{ route('difficulty.edit', $game->difficulty->id) }}"
                                            class="fw-bold">{{ $game->difficulty->name }}</a></td>
                                    <td>>{{ $game->date->format('d/m/YYYY') }}</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <h3 class="text-center">Não há jogos cadastrados</h3>
            @endif
        </div>
    </div>
@endsection
