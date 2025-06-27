@extends('layouts.admin')

@section('content')
    <h2>Detalhes Status Curso</h2>

    @can('index-course-status')
        <a href="{{ route('course_statuses.index') }}">Listar</a><br>
    @endcan

    @can('edit-course-status')
        <a href="{{ route('course_statuses.edit', ['courseStatus' => $courseStatus->id]) }}">Editar</a><br>
    @endcan
   
    @can('destroy-course-status')
        <form action="{{ route('course_statuses.destroy', ['courseStatus' => $courseStatus->id]) }}" method="POST">
            @csrf
            @method('delete')

            <button type="submit" onclick="return confirm('Tem certeza que deseja apagar este registro?')">Apagar</button>

        </form><br>
    @endcan
    
    <br>
    <x-alert />

    {{-- Imprimir o registro --}}
    ID: {{ $courseStatus->id }}<br>
    Nome: {{ $courseStatus->name }}<br>
    Cadastrado: {{ \Carbon\Carbon::parse($courseStatus->created_at)->format('d/m/Y H:i:s') }}<br>
    Editado: {{ \Carbon\Carbon::parse($courseStatus->updated_at)->format('d/m/Y H:i:s') }}<br>
@endsection
