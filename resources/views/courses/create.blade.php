@extends('layouts.admin')

@section('content')
    <h2>Cadastrar os cursos!</h2>

    <a href="{{ route('courses.index') }}">Listar</a><br>

    <x-alert/>

    <form action="{{ route('courses.store') }}" method="POST">
        @csrf
        @method('POST')

        <label>Nome</label>
        <input type="text" name="name" id="name" placeholder="Nome do curso" value="{{ old('name') }}" required><br><br>

        <button type="submit">Cadastrar</button>
    </form>
@endsection
