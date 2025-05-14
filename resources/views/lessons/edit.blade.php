@extends('layouts.admin')

@section('content')
    <h2>Editar Aula</h2>
    
    <a href="{{ route('lessons.index', ['module' => $lesson->module_id]) }}">Aulas</a><br>
    <a href="{{ route('lessons.show', ['lesson' => $lesson->id]) }}">Visualizar</a><br><br>

    <x-alert />

    <form action="{{ route('lessons.update', ['lesson' => $lesson->id]) }}" method="POST">
        @csrf
        @method('PUT')
 
        <label>Nome: </label>
        <input type="text" name="name" id="name" placeholder="Nome da aula" value="{{ old('name', $lesson->name) }}"
            required><br><br>

        <button type="submit">Salvar</button>
    </form>
@endsection
