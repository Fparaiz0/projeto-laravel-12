@extends('layouts.admin')

@section('content')
    <h2>Detalhes da aula</h2>

    <x-alert/>
    
    <a href="{{ route('lessons.index') }}">Listar</a><br><br>

    {{-- Imprimir os registros --}}
        ID: {{ $lesson->id }} <br>
        Nome: {{ $lesson->name }} <br>
        Data de cadastro: {{ \Carbon\Carbon::parse($lesson->created_at)-> format('d/m/Y H:i:s')}} <br>
        Data de atualização: {{ \Carbon\Carbon::parse($lesson->updated_at)-> format('d/m/Y H:i:s')}} <br>
        
@endsection
