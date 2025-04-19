@extends('layouts.admin')

@section('content')
    <h2>Listar os status!</h2>

    <x-alert/>

    <a href="{{ route('user_statuses.create') }}">Cadastrar</a><br><br>

    {{-- Imprimir os registros --}}
    @forelse ($userStatuses as $userStatus)
        ID: {{ $userStatus->id }} <br>
        Nome: {{ $userStatus->name }} <br>
       <a href="{{ route('user_statuses.show', ['userStatus' => $userStatus->id]) }}">Visualizar</a><br>
       <a href="{{ route('user_statuses.edit', ['userStatus' => $userStatus->id]) }}">Editar</a><br>
        <hr>
    @empty
        
    @endforelse
@endsection
