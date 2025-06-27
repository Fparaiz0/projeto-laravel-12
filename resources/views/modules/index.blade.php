@extends('layouts.admin')

@section('content')
    <h2>Listar os Módulos</h2>

    @can('index-course-batch')
        <a href="{{ route('course_batches.index', ['course' => $courseBatch->course_id]) }}">Listar as Turma</a><br>
    @endcan

    @can('create-module')
        <a href="{{ route('modules.create', ['courseBatch' => $courseBatch->id]) }}">Cadastrar</a><br>
    @endcan

    <br>
    <x-alert />

    {{-- Imprimir os registros --}}
    @forelse ($modules as $module)
        ID: {{ $module->id }}<br>
        Nome: {{ $module->name }}<br>

        @can('index-lesson')
            <a href="{{ route('lessons.index', ['module' => $module->id]) }}">Listar Aulas</a><br>
        @endcan

        @can('show-module')
            <a href="{{ route('modules.show', ['module' => $module->id]) }}">Visualizar</a><br>
        @endcan

        @can('edit-module')
            <a href="{{ route('modules.edit', ['module' => $module->id]) }}">Editar</a><br>
        @endcan

        @can('destroy-module')
            <form action="{{ route('modules.destroy', ['module' => $module->id]) }}" method="POST">
                @csrf
                @method('delete')

                <button type="submit" onclick="return confirm('Tem certeza que deseja apagar este registro?')">Apagar</button>

            </form>
        @endcan
        
        <hr>
    @empty
        Nenhum registro encontrado!
    @endforelse

    {{ $modules->links() }}
@endsection
