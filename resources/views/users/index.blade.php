@extends('layouts.admin')

@section('content')
    <h2>Listar os usuários!</h2>

    <x-alert/>
    
    <a href="{{ route('users.create') }}">Cadastrar</a>
@endsection
