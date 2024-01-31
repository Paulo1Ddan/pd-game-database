@extends('layouts.app.layout')
@section('title', 'Dificuldades - Inicio')

@push('style-css')
    <link rel="stylesheet" href="{{ asset('css/app/difficulty/index.css') }}">
@endpush

@section('content')
    <div class="difficulty default-layout">
        <h3 class="difficulty-title text-white">Dificuldade</h3>
        <p class="difficulty-text text-white fs-5">Crie um sistema de dificuldade do seu jeito. Pode ser um sistema númerico
            (1, 2,3..), ou quem sabe, um sistema com letras (D, C, B, A...). Use sua criatividade</p>

        <div class="difficulty-container p-3 text-white rounded mt-3">

            <div class="title-create flex-between-center">
                <h3>Dificuldades</h3>

                <a href="{{ route('difficulty.create') }}"
                    class="difficulty-create-button main-bg-color rounded flex-full-center fs-6">Criar dificuldade</a>
            </div>
            @if (count($difficulties) > 0)
                <div class="table-responsive">
                    <table class="table difficulty-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Sistema</th>
                                <th>Descrição</th>
                                <th>Qtd. Jogos</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($difficulties as $difficulty)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td><a href="{{ route('difficulty.edit', $difficulty->id) }}" class="fw-bold">{{ $difficulty->system }}</a></td>
                                    <td>{{ $difficulty->description }}</td>
                                    <td>{{ count($difficulty->games) }}</td>
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