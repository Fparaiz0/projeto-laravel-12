@extends('layouts.admin')

@section('content')
    <h2>Detalhes das turmas</h2>

    <x-alert/>
    
    <a href="{{ route('course_batches.index') }}">Listar</a><br>
    <a href="{{ route('course_batches.edit', ['courseBatch' => $courseBatch->id]) }}">Editar</a><br>
    <form action="{{ route('course_batches.destroy', ['courseBatch' => $courseBatch->id]) }}" method="POST">
        @csrf
        @method('delete')
        <button type="submit" onclick="return confirm('Tem certeza que deseja apagar este registro?')">Apagar</button>
    </form><br><br>

    {{-- Imprimir os registros --}}
        ID: {{ $courseBatch->id }} <br>
        Nome: {{ $courseBatch->name }} <br>
        Curso: {{ $courseBatch->course->name }} <br>
        Data de cadastro: {{ \Carbon\Carbon::parse($courseBatch->created_at)-> format('d/m/Y H:i:s')}} <br>
        Data de atualização: {{ \Carbon\Carbon::parse($courseBatch->updated_at)-> format('d/m/Y H:i:s')}} <br>
        
@endsection