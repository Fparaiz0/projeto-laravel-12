@extends('layouts.admin')

@section('content')
    <h2>Detalhes do Módulo</h2>

    <a href="{{ route('modules.index', ['courseBatch' => $module->course_batch_id]) }}">Listar Módulos</a><br>
    <a href="{{ route('lessons.index', ['module' => $module->id]) }}">Listar Aulas</a><br>
    <a href="{{ route('modules.edit', ['module' => $module->id]) }}">Editar</a><br>

    <form action="{{ route('modules.destroy', ['module' => $module->id]) }}" method="POST">
        @csrf
        @method('delete')

        <button type="submit" onclick="return confirm('Tem certeza que deseja apagar este registro?')">Apagar</button>

    </form><br><br>

    <x-alert />

    {{-- Imprimir o registro --}}
    ID: {{ $module->id }}<br>
    Nome: {{ $module->name }}<br>
    Turma: <a href="{{ route('course_batches.show', ['courseBatch' => $module->courseBatch->id]) }}">{{ $module->courseBatch->name }}</a><br>
    Cadastrado: {{ \Carbon\Carbon::parse($module->created_at)->format('d/m/Y H:i:s') }}<br>
    Editado: {{ \Carbon\Carbon::parse($module->updated_at)->format('d/m/Y H:i:s') }}<br>
@endsection
