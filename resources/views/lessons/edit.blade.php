@extends('layouts.admin')

@section('content')
    <h2>Editar a aula!</h2>

    <x-alert />

    <a href="{{ route('lessons.index') }}">Listar</a><br>
    <a href="{{ route('lessons.show', ['lesson' => $lesson->id]) }}">Visualizar</a>

    <form action="{{ route('lessons.update', ['lesson' => $lesson->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Nome: </label>
        <input type="text" name="name" id="name" placeholder="Nome da aula" value=" {{ old('name', $lesson->name) }} " required><br><br>

        <button type="submit">Salvar</button>
    </form>
@endsection