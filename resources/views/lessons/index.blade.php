@extends('layouts.admin')

@section('content')
    <h2>Listar as Aulas</h2>

    @can('index-module')
        <a href="{{ route('modules.index', ['courseBatch' => $module->course_batch_id]) }}">Listar os Módulos</a><br>
    @endcan

    @can('create-lesson')
        <a href="{{ route('lessons.create', ['module' => $module->id]) }}">Cadastrar</a><br><br>
    @endcan

    <x-alert />

    {{-- Imprimir os registros --}}
    @forelse ($lessons as $lesson)
        ID: {{ $lesson->id }}<br>
        Nome: {{ $lesson->name }}<br>
        Módulo: <a href="{{ route('modules.show', ['module' => $module->id]) }}">{{ $module->name }}</a><br>

        @can('show-lesson')
            <a href="{{ route('lessons.show', ['lesson' => $lesson->id]) }}">Visualizar</a><br>
        @endcan

        @can('edit-lesson')
            <a href="{{ route('lessons.edit', ['lesson' => $lesson->id]) }}">Editar</a><br>
        @endcan

        @can('destroy-lesson')
            <form action="{{ route('lessons.destroy', ['lesson' => $lesson->id]) }}" method="POST">
                @csrf
                @method('delete')

                <button type="submit" onclick="return confirm('Tem certeza que deseja apagar este registro?')">Apagar</button>

            </form>
        @endcan

        <hr>
    @empty
        Nenhum registro encontrado!
    @endforelse

    {{ $lessons->links() }}
@endsection
