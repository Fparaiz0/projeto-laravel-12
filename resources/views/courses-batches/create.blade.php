@extends('layouts.admin')

@section('content')
    <h2>Cadastrar as turmas dos cursos!</h2>

    <a href="{{ route('courses-batches.index') }}">Listar</a><br><br>

    <form action="{{ route('courses-batches.store') }}" method="POST">
        @csrf
        @method('POST')

        <label>Nome da turma: </label>
        <input type="text" name="name" id="name" placeholder="Nome da turma" required><br><br>

        <button type="submit">Cadastrar</button>
    </form>
@endsection
