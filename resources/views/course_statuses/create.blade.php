@extends('layouts.admin')

@section('content')
    <h2>Cadastrar os status dos cursos!</h2>

    <x-alert/>

    <a href="{{ route('course_statuses.index') }}">Listar</a><br><br>

    <form action="{{ route('course_statuses.store') }}" method="POST">
        @csrf
        @method('POST')

        <label>Nome do status: </label>
        <input type="text" name="name" id="name" placeholder="Nome do status" value="{{ old('name') }}" required><br><br>

        <button type="submit">Cadastrar</button>
    </form>
@endsection