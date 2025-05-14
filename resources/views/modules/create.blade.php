@extends('layouts.admin')

@section('content')
    <h2>Cadastrar Módulo</h2>

    {{-- <a href="{{ route('modules.index') }}">Listar</a><br><br> --}}

    <x-alert />

    <form action="{{ route('modules.store', ['courseBatch' => $courseBatch]) }}" method="POST">
        @csrf
        @method('POST')

        <label>Nome: </label>
        <input type="text" name="name" id="name" placeholder="Nome do módulo" value="{{ old('name') }}" required><br><br>

        <button type="submit">Cadastrar</button>
    </form>
@endsection
