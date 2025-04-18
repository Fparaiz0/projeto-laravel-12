@extends('layouts.admin')

@section('content')
    <h2>Listar as aulas!</h2>

    <x-alert/> 
    
    <a href="{{ route('lessons.create') }}">Cadastrar</a>
@endsection