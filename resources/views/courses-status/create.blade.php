@extends('layouts.admin')

@section('content')
    <h2>Cadastrar os status dos cursos!</h2>

    <a href="{{ route('courses-status.index') }}">Listar</a><br><br>

    <form action="{{ route('courses-status.store') }}" method="POST">
        @csrf
        @method('POST')

        <label>Nome do status: </label>
        <input type="text" name="name" id="name" placeholder="Nome do status" required><br><br>

        <button type="submit">Cadastrar</button>
    </form>
@endsection