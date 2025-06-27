@extends('layouts.admin')

@section('content')
    <h2>Cadastrar Turma</h2>

    @can('index-course-batch')
        <a href="{{ route('course_batches.index', ['course' => $course->id]) }}">Turmas</a><br>
    @endcan

    <x-alert />

        <form action="{{ route('course_batches.store', ['course' => $course->id]) }}" method="POST">
            @csrf
            @method('POST')

            <label>Nome: </label>
            <input type="text" name="name" id="name" placeholder="Nome da turma" value="{{ old('name') }}"
                required><br><br>

            <button type="submit">Cadastrar</button>
        </form>
@endsection
