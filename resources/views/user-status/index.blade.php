@extends('layouts.admin')

@section('content')
    <h2>Listar os status!</h2>

    <x-alert/>

    <a href="{{ route('user-status.create') }}">Cadastrar</a><br><br>

    {{-- Imprimir os registros --}}
    @forelse ($userStatuses as $userStatus)
        ID: {{ $userStatus->id }} <br>
        Nome: {{ $userStatus->name }} <br>
       <a href="{{ route('user-status.show', ['userStatus' => $userStatus->id]) }}">Visualizar</a>  
        <hr>
    @empty
        
    @endforelse
@endsection
