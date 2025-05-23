@extends('layouts.admin')

@section('content')
    <h2>Editar o curso</h2>

    <x-alert />

    <a href="{{ route('courses.index') }}">Listar</a><br>
    <a href="{{ route('courses.show', ['course' => $course->id]) }}">Visualizar</a><br>

    <form action="{{ route('courses.update', ['course' => $course->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Nome</label>
        <input type="text" name="name" id="name" placeholder="Nome do curso" value="{{ old('name', $course->name) }}" required><br><br>

        <button type="submit">Salvar</button>
    </form>
@endsection
