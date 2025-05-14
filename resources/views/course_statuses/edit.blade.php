@extends('layouts.admin')

@section('content')
    <h2>Editar Status Curso</h2>

    <a href="{{ route('course_statuses.index') }}">Listar</a><br>
    <a href="{{ route('course_statuses.show', ['courseStatus' => $courseStatus->id]) }}">Visualizar</a><br><br>

    <x-alert />

    <form action="{{ route('course_statuses.update', ['courseStatus' => $courseStatus->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Nome: </label>
        <input type="text" name="name" id="name" placeholder="Nome do status" value="{{ old('name', $courseStatus->name) }}" required><br><br>

        <button type="submit">Salvar</button>
    </form>
@endsection
