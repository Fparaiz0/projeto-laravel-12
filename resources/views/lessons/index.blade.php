@extends('layouts.admin')

@section('content')
    <h2>Listar as aulas!</h2>

    <x-alert/> 
    
    <a href="{{ route('lessons.create') }}">Cadastrar</a><br><br>

    {{-- Imprimir os registros --}}
    @forelse ($lessons as $lesson)
        ID: {{ $lesson->id }} <br>
        Nome: {{ $lesson->name }} <br>
        <hr>
    @empty
        
    @endforelse
@endsection