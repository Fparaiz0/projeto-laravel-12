@extends('layouts.admin')

@section('content')
    <h2>Cadastrar os status!</h2>

    <x-alert/>

    <a href="{{ route('user_statuses.index') }}">Listar</a><br><br>

    <form action="{{ route('user_statuses.store') }}" method="POST">
        @csrf
        @method('POST')

        <label>Nome: </label>
        <input type="text" name="name" id="name" placeholder="Nome do usuário" value="{{ old('name') }}" required><br><br>

        <button type="submit">Cadastrar</button>
@endsection
