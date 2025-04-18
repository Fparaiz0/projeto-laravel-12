@extends('layouts.admin')

@section('content')
    <h2>Listar os módulos!</h2>

    <x-alert/> 
    
    <a href="{{ route('modules.create') }}">Cadastrar</a>
@endsection