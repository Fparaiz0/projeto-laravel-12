@extends('layouts.admin')

@section('content')
    <h2>Listar os Cursos</h2>

    @can ('create-course' )
        <a href="{{ route('courses.create') }}">Cadastrar</a><br><br>
    @endcan

    <x-alert />

    {{-- Imprimir os registros --}}
    @forelse ($courses as $course)
        ID: {{ $course->id }}<br>
        Nome: {{ $course->name }}<br>

        @can('index-course-batch')
            <a href="{{ route('course_batches.index', ['course' => $course->id]) }}">Turmas</a><br>
        @endcan

        @can ('show-course' )
            <a href="{{ route('courses.show', ['course' => $course->id]) }}">Visualizar</a><br>
        @endcan

        @can ('edit-course' )
            <a href="{{ route('courses.edit', ['course' => $course->id]) }}">Editar</a><br>
        @endcan

        @can ('destroy-course' )
            <form action="{{ route('courses.destroy', ['course' => $course->id]) }}" method="POST">
                @csrf
                @method('delete')

                <button type="submit" onclick="return confirm('Tem certeza que deseja apagar este registro?')">Apagar</button>
            </form>
        @endcan

        <hr>
    @empty
        Nenhum registro encontrado!
    @endforelse

    {{ $courses->links() }}
@endsection
