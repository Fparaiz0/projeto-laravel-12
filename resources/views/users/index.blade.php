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
        <a href="{{ route('users.show', ['user' => $user->id]) }}">Visualizar</a><br>
        <a href="{{ route('users.edit', ['user' => $user->id]) }}">Editar</a>

        <form action="{{ route('users.destroy', ['user' => $user->id]) }}" method="POST">
            @csrf
            @method('delete')
            <button type="submit" onclick="return confirm('Tem certeza que deseja apagar este registro?')">Apagar</button>
        </form>
        <hr>
    @empty
        Nenhum registro encontrado!
    @endforelse
@endsection
