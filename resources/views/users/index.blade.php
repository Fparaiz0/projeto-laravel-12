@extends('layouts.admin')

@section('content')
    <h2>Listar os usuários!</h2>

    <x-alert/>
    
    <a href="{{ route('users.create') }}">Cadastrar</a><br><br>

    {{-- Imprimir os registros --}}
    @forelse ($users as $user)
        ID: {{ $user->id }} <br>
        Nome: {{ $user->name }} <br>
        Email: {{ $user->email }} <br>
        <a href="{{ route('users.show', ['user' => $user->id]) }}">Visualizar</a>
        <hr>
    @empty
        
    @endforelse
@endsection
