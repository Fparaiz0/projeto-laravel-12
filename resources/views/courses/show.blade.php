@extends('layouts.admin')

@section('content')
    <h2>Detalhes do curso</h2>

    <x-alert/>

    <a href="{{ route('courses.index') }}">Listar</a><br>
    <a href="{{ route('courses.edit', ['course' => $course->id]) }}">Editar</a><br>
    <form action="{{ route('courses.destroy', ['course' => $course->id]) }}" method="POST">
        @csrf
        @method('delete')
        <button type="submit" onclick="return confirm('Tem certeza que deseja apagar este registro?')">Apagar</button>
    </form><br><br>


    {{-- Imprimir o registro --}}
        ID: {{ $course->id }} <br>
        Nome: {{ $course->name }} <br>
        Data de cadastro: {{ \Carbon\Carbon::parse($course->created_at)->format('d/m/Y H:i:s') }}<br>
        Data de atualização: {{ \Carbon\Carbon::parse($course->updated_at)->format('d/m/Y H:i:s') }}<br> 
@endsection
