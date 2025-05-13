@extends('layouts.admin')

@section('content')
    <h2>Detalhes do usuário</h2>

    <x-alert/>
    
    <a href="{{ route('users.index') }}">Listar</a><br>
    <a href="{{ route('users.edit', ['user' => $user->id]) }}">Editar</a><br>
    <a href="{{ route('users.edit_password', ['user' => $user->id]) }}">Editar Senha</a><br>
    <form action="{{ route('users.destroy', ['user' => $user->id]) }}" method="POST">
        @csrf
        @method('delete')
        <button type="submit" onclick="return confirm('Tem certeza que deseja apagar este registro?')">Apagar</button>
    </form><br><br>

    {{-- Imprimir os registros --}}
    ID: {{ $user->id }} <br>
    Nome: {{ $user->name }} <br>
    Email: {{ $user->email }} <br>
    Status: {{ $user->userStatus->name }} <br>
    Data de cadastro: {{ \Carbon\Carbon::parse($user->created_at)-> format('d/m/Y H:i:s')}} <br>
    Data de atualização: {{ \Carbon\Carbon::parse($user->updated_at)-> format('d/m/Y H:i:s')}} <br>
        
@endsection