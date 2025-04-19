@extends('layouts.admin')

@section('content')
    <h2>Editar o status do curso</h2>

    <x-alert/>

    <a href="{{ route('course_statuses.index') }}">Listar</a><br>
    <a href="{{ route('course_statuses.show', ['courseStatus' => $courseStatus->id]) }}">Visualizar</a><br>

    <form action="{{ route('course_statuses.update', ['courseStatus' => $courseStatus->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Nome</label>
        <input type="text" name="name" id="name" placeholder="Nome do curso" value="{{ old('name', $courseStatus->name) }}" required><br><br>

        <button type="submit">Salvar</button>
    </form>
@endsection