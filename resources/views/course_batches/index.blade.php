@extends('layouts.admin')

@section('content')
    <h2>Listar as Turmas</h2>

    <a href="{{ route('courses.index') }}">Listar os Cursos</a><br>
    <a href="{{ route('course_batches.create', ['course' => $course->id]) }}">Cadastrar Turma</a><br><br>

    <x-alert />

    {{-- Imprimir os registros --}}
    @forelse ($coursesBatches as $courseBatch)
        ID: {{ $courseBatch->id }}<br>
        Nome: {{ $courseBatch->name }}<br>
        Curso: <a href="{{ route('courses.show', ['course' => $course->id]) }}">{{ $course->name }}</a><br>
        <a href="{{ route('modules.index', ['courseBatch' => $courseBatch->id]) }}">Listar os Módulos</a><br>
        <a href="{{ route('course_batches.show', ['courseBatch' => $courseBatch->id]) }}">Visualizar</a><br>
        <a href="{{ route('course_batches.edit', ['courseBatch' => $courseBatch->id]) }}">Editar</a><br>

        <form action="{{ route('course_batches.destroy', ['courseBatch' => $courseBatch->id]) }}" method="POST">
            @csrf
            @method('delete')

            <button type="submit" onclick="return confirm('Tem certeza que deseja apagar este registro?')">Apagar</button>

        </form>
        <hr>
    @empty
        Nenhum registro encontrado!
    @endforelse

    {{ $coursesBatches->links() }}
@endsection
