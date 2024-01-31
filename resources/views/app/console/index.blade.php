@extends('layouts.app.layout')
@section('title', 'Consoles - Inicio')

@push('style-css')
    <link rel="stylesheet" href="{{ asset('css/app/console/index.css') }}">
@endpush

@section('content')
    <div class="console default-layout">
        <h3 class="console-title text-white">Consoles</h3>
        <p class="console-text text-white fs-5">Gerencie os consoles dos jogos que você zerou.</p>

        <div class="console-container p-3 text-white rounded mt-3">

            <div class="title-create flex-between-center">
                <h3>Consoles</h3>
                <a href="{{ route('console.create') }}" class="console-create-button main-bg-color rounded flex-full-center fs-6">Criar console</a>
            </div>
            @if (count($consoles) > 0)
                <div class="table-responsive">
                    <table class="table console-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Imagem</th>
                                <th>Console</th>
                                <th>Qtd. Jogos</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($consoles as $console)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td><img src="{{ asset('storage/'.$console->img) }}" alt="" class="console-img"></td>
                                    <td><a href="{{ route('console.edit', $console->id) }}" class="fw-bold">{{ $console->name }}</a></td>
                                    <td>{{ count($console->games) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <h3 class="text-center">Não há consoles cadastrados</h3>
            @endif
        </div>
    </div>
@endsection
