@extends('layouts.admin')

@section('content')
    <h2>Detalhes da aula</h2>

    <x-alert/>
    
    <a href="{{ route('lessons.index') }}">Listar</a><br>
    <a href="{{ route('lessons.edit', ['lesson' => $lesson->id]) }}">Editar</a><br>
    <form action="{{ route('lessons.destroy', ['lesson' => $lesson->id]) }}" method="POST">
        @csrf
        @method('delete')
        <button type="submit" onclick="return confirm('Tem certeza que deseja apagar este registro?')">Apagar</button>
    </form><br><br>

    {{-- Imprimir os registros --}}
        ID: {{ $lesson->id }} <br>
        Nome: {{ $lesson->name }} <br>
        Módulo: {{ $lesson->module->name }} <br>
        Data de cadastro: {{ \Carbon\Carbon::parse($lesson->created_at)-> format('d/m/Y H:i:s')}} <br>
        Data de atualização: {{ \Carbon\Carbon::parse($lesson->updated_at)-> format('d/m/Y H:i:s')}} <br>
        
@endsection
