@extends('layouts.admin')

@section('content')
    <h2>Detalhes da Turma</h2>

    <a href="{{ route('course_batches.index', ['course' => $courseBatch->course_id]) }}">Listar as Turmas</a><br>
    <a href="{{ route('modules.index', ['courseBatch' => $courseBatch->id]) }}">Listar os Módulos</a><br>
    <a href="{{ route('course_batches.edit', ['courseBatch' => $courseBatch->id]) }}">Editar</a><br>

    <form action="{{ route('course_batches.destroy', ['courseBatch' => $courseBatch->id]) }}" method="POST">
        @csrf
        @method('delete')

        <button type="submit" onclick="return confirm('Tem certeza que deseja apagar este registro?')">Apagar</button>

    </form><br><br>

    <x-alert />

    {{-- Imprimir o registro --}}
    ID: {{ $courseBatch->id }}<br>
    Nome: {{ $courseBatch->name }}<br>
    Curso: <a href="{{ route('courses.show', ['course' => $courseBatch->course->id]) }}">{{ $courseBatch->course->name }}</a><br>
    Cadastrado: {{ \Carbon\Carbon::parse($courseBatch->created_at)->format('d/m/Y H:i:s') }}<br>
    Editado: {{ \Carbon\Carbon::parse($courseBatch->updated_at)->format('d/m/Y H:i:s') }}<br>
@endsection
