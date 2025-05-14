@extends('layouts.admin')

@section('content')
    <h2>Cadastrar Status Curso</h2>

    <a href="{{ route('course_statuses.index') }}">Listar</a><br><br>

    <x-alert />

    <form action="{{ route('course_statuses.store') }}" method="POST">
        @csrf
        @method('POST')

        <label>Nome: </label>
        <input type="text" name="name" id="name" placeholder="Nome do status" value="{{ old('name') }}" required><br><br>

        <button type="submit">Cadastrar</button>
    </form>
@endsection
