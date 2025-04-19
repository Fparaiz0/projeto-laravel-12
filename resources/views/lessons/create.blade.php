@extends('layouts.admin')

@section('content')
    <h2>Cadastrar as aulas!</h2>

    <x-alert />

    <a href="{{ route('lessons.index') }}">Listar</a><br><br>

    <form action="{{ route('lessons.store') }}" method="POST">
        @csrf
        @method('POST')

        <label>Nome da aula: </label>
        <input type="text" name="name" id="name" placeholder="Nome da aula" value=" {{ old('name') }} " required><br><br>

        <button type="submit">Cadastrar</button>
    </form>
@endsection
