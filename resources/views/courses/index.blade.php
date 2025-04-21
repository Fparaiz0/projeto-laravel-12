@extends('layouts.admin')

@section('content')
    <h2>Listar os cursos!</h2>

    <x-alert/>

    <a href="{{ route('courses.create') }}">Cadastrar</a><br><br>

    {{-- Imprimir os registros --}}
    @forelse ($courses as $course)
        ID: {{ $course->id }} <br>
        Nome: {{ $course->name }} <br>
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

    {{-- Paginação --}}
    {{ $courses->links() }}
@endsection
