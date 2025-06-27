@extends('layouts.admin')

@section('content')
    <h2>Detalhes do Curso</h2>

    @can('index-course')
        <a href="{{ route('courses.index') }}">Listar Cursos</a><br>
    @endcan

    @can('index-course-batch')
    <a href="{{ route('course_batches.index', ['course' => $course->id]) }}">Listar Turmas</a><br>
    @endcan
    
    @can('edit-course')
    <a href="{{ route('courses.edit', ['course' => $course->id]) }}">Editar</a><br>
    @endcan

    @can('destroy-course')
        <form action="{{ route('courses.destroy', ['course' => $course->id]) }}" method="POST">
        @csrf
        @method('delete')

        <button type="submit" onclick="return confirm('Tem certeza que deseja apagar este registro?')">Apagar</button>

    </form><br><br>
    @endcan

    <x-alert />

    {{-- Imprimir o registro --}}
    ID: {{ $course->id }}<br>
    Nome: {{ $course->name }}<br>
    Status: {{ $course->courseStatus->name }}<br>
    Cadastrado: {{ \Carbon\Carbon::parse($course->created_at)->format('d/m/Y H:i:s') }}<br>
    Editado: {{ \Carbon\Carbon::parse($course->updated_at)->format('d/m/Y H:i:s') }}<br>
@endsection
