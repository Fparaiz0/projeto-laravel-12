@extends('layouts.admin')

@section('content')
    <h2>Editar turma</h2>

    <x-alert/>

    <a href="{{ route('course_batches.index') }}">Listar</a><br>
    <a href="{{ route('course_batches.show', ['courseBatch' => $courseBatch->id]) }}">Visualizar</a><br>

    <form action="{{ route('course_batches.update', ['courseBatch' => $courseBatch->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Nome</label>
        <input type="text" name="name" id="name" placeholder="Nome do curso" value="{{ old('name', $courseBatch->name) }}" required><br><br>

        <button type="submit">Salvar</button>
    </form>
@endsection
