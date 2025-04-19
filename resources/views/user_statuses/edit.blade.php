@extends('layouts.admin')

@section('content')
    <h2>Editar o status do usuário</h2>

    <x-alert/>

    <a href="{{ route('user_statuses.index') }}">Listar</a><br>
    <a href="{{ route('user_statuses.show', ['userStatus' => $userStatus->id]) }}">Visualizar</a><br>

    <form action="{{ route('user_statuses.update', ['userStatus' => $userStatus->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Nome</label>
        <input type="text" name="name" id="name" placeholder="Nome do curso" value="{{ old('name', $userStatus->name) }}" required><br><br>

        <button type="submit">Salvar</button>
    </form>
@endsection
