@extends('layouts.admin')

@section('content')
    <h2>Listar os Módulos</h2>


    <a href="{{ route('course_batches.index', ['course' => $courseBatch->course_id]) }}">Listar as Turma</a><br>
    <a href="{{ route('modules.create', ['courseBatch' => $courseBatch->id]) }}">Cadastrar</a><br><br>

    <x-alert />

    {{-- Imprimir os registros --}}
    @forelse ($modules as $module)
        ID: {{ $module->id }}<br>
        Nome: {{ $module->name }}<br>
        <a href="{{ route('lessons.index', ['module' => $module->id]) }}">Listar Aulas</a><br>
        <a href="{{ route('modules.show', ['module' => $module->id]) }}">Visualizar</a><br>
        <a href="{{ route('modules.edit', ['module' => $module->id]) }}">Editar</a><br>

        <form action="{{ route('modules.destroy', ['module' => $module->id]) }}" method="POST">
            @csrf
            @method('delete')

            <button type="submit" onclick="return confirm('Tem certeza que deseja apagar este registro?')">Apagar</button>

        </form>
        <hr>
    @empty
        Nenhum registro encontrado!
    @endforelse

    {{ $modules->links() }}
@endsection
