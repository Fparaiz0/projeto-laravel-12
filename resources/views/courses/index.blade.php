@extends('layouts.admin')

@section('content')
    <h2>Listar os Cursos</h2>

    <a href="{{ route('courses.create') }}">Cadastrar</a><br><br>

    <x-alert />

    {{-- Imprimir os registros --}}
    @forelse ($courses as $course)
        ID: {{ $course->id }}<br>
        Nome: {{ $course->name }}<br>
        <a href="{{ route('course_batches.index', ['course' => $course->id]) }}">Turmas</a><br>
        <a href="{{ route('courses.show', ['course' => $course->id]) }}">Visualizar</a><br>
        <a href="{{ route('courses.edit', ['course' => $course->id]) }}">Editar</a><br>

        <form action="{{ route('courses.destroy', ['course' => $course->id]) }}" method="POST">
            @csrf
            @method('delete')

            <button type="submit" onclick="return confirm('Tem certeza que deseja apagar este registro?')">Apagar</button>

        </form>

        <hr>
    @empty
        Nenhum registro encontrado!
    @endforelse

    {{ $courses->links() }}
@endsection
