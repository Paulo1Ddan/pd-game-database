@extends('layouts.app.layout')
@section('title', 'Pontuação - Inicio')

@push('style-css')
    <link rel="stylesheet" href="{{ asset('css/app/score/index.css') }}">
@endpush

@section('content')
    <div class="score default-layout">
        <h3 class="score-title text-white">Pontuação</h3>
        <p class="score-text text-white fs-5">Quer dar uma nota para um jogo? Crie seu sistema próprio de pontuação.
            Poderá ser do seu jeito, númerico, ou com letras. Use sua criatividade</p>

        <div class="score-container p-3 text-white rounded mt-3">

            <div class="title-create flex-between-center">
                <h3>Pontualçao</h3>

                <a href="{{ route('score.create') }}"
                    class="score-create-button main-bg-color rounded flex-full-center fs-6">Criar pontuação</a>
            </div>
            @if (count($scores) > 0)
                <div class="table-responsive">
                    <table class="table score-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Sistema</th>
                                <th>Descrição</th>
                                <th>Cor</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($scores as $score)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td><a href="{{ route('score.edit', $score->id) }}"
                                            class="fw-bold">{{ $score->system }}</a></td>
                                    <td>{{ $score->description }}</td>
                                    <td>{{ $score->color }} <span class="color"
                                            style="background: {{ $score->color }}"></span></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <h3 class="text-center">Não há pontuação cadastrada</h3>
            @endif
        </div>
    </div>
@endsection
