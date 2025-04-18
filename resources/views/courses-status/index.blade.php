@extends('layouts.admin')

@section('content')
    <h2>Listar os status do curso!</h2>

    <x-alert/>
    
    <a href="{{ route('courses-status.create') }}">Cadastrar</a><br><br>

    {{-- Imprimir os registros --}}
    @forelse ($coursesStatuses as $courseStatus)
        ID: {{ $courseStatus->id }} <br>
        Nome: {{ $courseStatus->name }} <br>
        <hr>
    @empty
        
    @endforelse
@endsection