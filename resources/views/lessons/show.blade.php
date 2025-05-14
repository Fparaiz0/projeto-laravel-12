@extends('layouts.admin')

@section('content')
    <h2>Detalhes da Aula</h2>

    <a href="{{ route('lessons.index', ['module' => $lesson->module->id]) }}">Aulas</a><br>
    <a href="{{ route('lessons.edit', ['lesson' => $lesson->id]) }}">Editar</a><br>

    <form action="{{ route('lessons.destroy', ['lesson' => $lesson->id]) }}" method="POST">
        @csrf
        @method('delete')

        <button type="submit" onclick="return confirm('Tem certeza que deseja apagar este registro?')">Apagar</button>

    </form><br><br>

    <x-alert />

    {{-- Imprimir o registro --}}
    ID: {{ $lesson->id }}<br>
    Nome: {{ $lesson->name }}<br>
    Módulo: {{ $lesson->module->name }}<br>
    Cadastrado: {{ \Carbon\Carbon::parse($lesson->created_at)->format('d/m/Y H:i:s') }}<br>
    Editado: {{ \Carbon\Carbon::parse($lesson->updated_at)->format('d/m/Y H:i:s') }}<br>
@endsection
