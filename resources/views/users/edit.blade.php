@extends('layouts.admin')

@section('content')
    <h2>Editar os usuários!</h2>

    <a href="{{ route('users.index') }}">Listar</a><br>
    <a href="{{ route('users.show', ['user' => $user->id]) }}">Visualizar</a>

    <x-alert />

    <form action="{{ route('users.update', ['user' => $user->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Nome: </label>
        <input type="text" name="name" id="name" placeholder="Nome do usuário" value=" {{ old('name', $user->name) }} " required><br><br>

        <label>Email: </label>
        <input type="email" name="email" id="email" placeholder="Email do usuário" value=" {{ old('email', $user->email) }} " required><br><br>

        <label>Senha: </label>
        <input type="password" name="password" id="password" placeholder="Senha" value=" {{ old('password', $user->password) }} " required><br><br>

        <button type="submit">Salvar</button>
    </form>
@endsection