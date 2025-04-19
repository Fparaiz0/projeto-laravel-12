@extends('layouts.admin')

@section('content')
    <h2>Cadastrar os módulos!</h2>

    <x-alert />

    <a href="{{ route('modules.index') }}">Listar</a><br><br>

    <form action="{{ route('modules.store') }}" method="POST">
        @csrf
        @method('POST')

        <label>Nome do módulo: </label>
        <input type="text" name="name" id="name" placeholder="Nome do módulo" value=" {{ old('name') }} " required><br><br>

        <button type="submit">Cadastrar</button>
    </form>
@endsection

