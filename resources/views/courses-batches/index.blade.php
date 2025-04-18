@extends('layouts.admin')

@section('content')
    <h2>Listar os lotes do curso!</h2>
     
        <x-alert/>

    <a href="{{ route('courses-batches.create') }}">Cadastrar</a>
@endsection