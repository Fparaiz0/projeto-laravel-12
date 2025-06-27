@extends('layouts.admin')

@section('content')
    <h2>Listar as Turmas</h2>

    @can('index-course')
        <a href="{{ route('courses.index') }}">Listar os Cursos</a><br>
    @endcan

    @can('create-course-batch')
        <a href="{{ route('course_batches.create', ['course' => $course->id]) }}">Cadastrar Turma</a><br><br>
    @endcan

    <x-alert />

    {{-- Imprimir os registros --}}
    @forelse ($coursesBatches as $courseBatch)
        ID: {{ $courseBatch->id }}<br>
        Nome: {{ $courseBatch->name }}<br>

    @can('show-course')
        Curso: <a href="{{ route('courses.show', ['course' => $course->id]) }}">{{ $course->name }}</a><br>
    @endcan

    @can('index-module')
        <a href="{{ route('modules.index', ['courseBatch' => $courseBatch->id]) }}">Listar os Módulos</a><br>
    @endcan

    @can('show-course-batch')
        <a href="{{ route('course_batches.show', ['courseBatch' => $courseBatch->id]) }}">Visualizar</a><br>
    @endcan

    @can('edit-course-batch')
        <a href="{{ route('course_batches.edit', ['courseBatch' => $courseBatch->id]) }}">Editar</a><br>
    @endcan

    @can('destroy-course-batch')
        <form action="{{ route('course_batches.destroy', ['courseBatch' => $courseBatch->id]) }}" method="POST">
            @csrf
            @method('delete')

            <button type="submit" onclick="return confirm('Tem certeza que deseja apagar este registro?')">Apagar</button>

        </form>
    @endcan    
    
        <hr>
    @empty
        Nenhum registro encontrado!
    @endforelse

    {{ $coursesBatches->links() }}
@endsection
