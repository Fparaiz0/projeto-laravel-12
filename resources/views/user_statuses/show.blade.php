@extends('layouts.admin')

@section('content')
    <h2>Detalhes do status do usuário</h2>

    <x-alert/>
    
    <a href="{{ route('user_statuses.index') }}">Listar</a><br>
    <a href="{{ route('user_statuses.edit', ['userStatus' => $userStatus->id]) }}">Editar</a><br>
    <form action="{{ route('user_statuses.destroy', ['userStatus' => $userStatus->id]) }}" method="POST">
        @csrf
        @method('delete')
        <button type="submit" onclick="return confirm('Tem certeza que deseja apagar este registro?')">Apagar</button>
    </form><br><br>

    {{-- Imprimir os registros --}}
        ID: {{ $userStatus->id }} <br>
        Nome: {{ $userStatus->name }} <br>
        Data de cadastro: {{ \Carbon\Carbon::parse($userStatus->created_at)-> format('d/m/Y H:i:s')}} <br>
        Data de atualização: {{ \Carbon\Carbon::parse($userStatus->updated_at)-> format('d/m/Y H:i:s')}} <br>
        
@endsection
