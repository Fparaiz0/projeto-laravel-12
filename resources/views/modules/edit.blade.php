@extends('layouts.admin')

@section('content')
    <h2>Editar Módulo</h2>

    <a href="{{ route('modules.index', ['courseBatch' => $module->course_batch_id]) }}">Listar Módulos</a><br>
    <a href="{{ route('modules.show', ['module' => $module->id]) }}">Visualizar</a><br><br>

    <x-alert /> 

    <form action="{{ route('modules.update', ['module' => $module->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Nome: </label>
        <input type="text" name="name" id="name" placeholder="Nome do módulo" value="{{ old('name', $module->name) }}"
            required><br><br>

        <button type="submit">Salvar</button>
    </form>
@endsection
