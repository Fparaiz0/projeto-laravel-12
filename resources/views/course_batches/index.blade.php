@extends('layouts.admin')

@section('content')
    <h2>Listar as turmas do curso!</h2>
     
        <x-alert/>

    <a href="{{ route('course_batches.create') }}">Cadastrar</a><br><br>

    {{-- Imprimir os registros --}}
    @forelse ($coursesBatches as $courseBatch)  
        ID: {{ $courseBatch->id }} <br>
        Nome: {{ $courseBatch->name }} <br>
        <a href="{{ route('course_batches.show', ['courseBatch' => $courseBatch->id]) }}">Visualizar</a>
        <hr>
    @empty
        
    @endforelse
@endsection