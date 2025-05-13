@extends('layouts.admin')

@section('content')
    <h2>Cadastrar as turmas dos cursos!</h2>

    <x-alert/>

    <a href="{{ route('course_batches.index') }}">Listar</a><br><br>

    <form action="{{ route('course_batches.store') }}" method="POST">
        @csrf
        @method('POST')

        <label>Nome da turma: </label>
        <input type="text" name="name" id="name" placeholder="Nome da turma" value="{{ old('name') }}" required><br><br>

        <button type="submit">Cadastrar</button>
    </form>
@endsection
