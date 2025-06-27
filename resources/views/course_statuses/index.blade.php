@extends('layouts.admin')

@section('content')
    <h2>Listar os Status Cursos</h2>

    @can('create-course-status')
        <a href="{{ route('course_statuses.create') }}">Cadastrar</a><br>
    @endcan

    <br>
    <x-alert />

    {{-- Imprimir os registros --}}
    @forelse ($coursesStatuses as $courseStatus)
        ID: {{ $courseStatus->id }}<br>
        Nome: {{ $courseStatus->name }}<br>

        @can('show-course-status')
            <a href="{{ route('course_statuses.show', ['courseStatus' => $courseStatus->id]) }}">Visualizar</a><br>
        @endcan

        @can('edit-course-status')
            <a href="{{ route('course_statuses.edit', ['courseStatus' => $courseStatus->id]) }}">Editar</a><br>
        @endcan

        @can('destroy-course-status')
            <form action="{{ route('course_statuses.destroy', ['courseStatus' => $courseStatus->id]) }}" method="POST">
                @csrf
                @method('delete')

                <button type="submit" onclick="return confirm('Tem certeza que deseja apagar este registro?')">Apagar</button>

            </form>
        @endcan
        
        <hr>
    @empty
        Nenhum registro encontrado!
    @endforelse

    {{ $coursesStatuses->links() }}
    
@endsection
