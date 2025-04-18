@extends('layouts.admin')

@section('content')
    <h2>Cadastrar os status!</h2>

    <a href="{{ route('user-status.index') }}">Listar</a><br><br>

    <form action="{{ route('user-status.store') }}" method="POST">
        @csrf
        @method('POST')

        <label>Nome: </label>
        <input type="text" name="name" id="name" placeholder="Nome do usuário" required><br><br>

        <button type="submit">Cadastrar</button>
@endsection
