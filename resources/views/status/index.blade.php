@extends('layouts.admin')

@section('content')
    <h2>Listar os status!</h2>

    <x-alert/>

    <a href="{{ route('status.create') }}">Cadastrar</a><br><br>

    {{-- Imprimir os registros --}}
    @forelse ($statuses as $status)
        ID: {{ $status->id }} <br>
        Nome: {{ $status->name }} <br>
        <hr>
    @empty
        
    @endforelse
@endsection
