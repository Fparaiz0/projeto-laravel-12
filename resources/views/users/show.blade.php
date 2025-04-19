@extends('layouts.admin')

@section('content')
    <h2>Detalhes do usuário</h2>

    <x-alert/>
    
    <a href="{{ route('users.index') }}">Listar</a><br>
    <a href="{{ route('users.edit', ['user' => $user->id]) }}">Editar</a><br>

    {{-- Imprimir os registros --}}
        ID: {{ $user->id }} <br>
        Nome: {{ $user->name }} <br>
        Email: {{ $user->email }} <br>
        Senha: {{ $user->password }} <br>
        Data de cadastro: {{ \Carbon\Carbon::parse($user->created_at)-> format('d/m/Y H:i:s')}} <br>
        Data de atualização: {{ \Carbon\Carbon::parse($user->updated_at)-> format('d/m/Y H:i:s')}} <br>
        
@endsection