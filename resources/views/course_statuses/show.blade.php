@extends('layouts.admin')

@section('content')
    <h2>Detalhes do status do curso</h2>

    <x-alert/>
    
    <a href="{{ route('course_statuses.index') }}">Listar</a><br><br>

    {{-- Imprimir os registros --}}
        ID: {{ $courseStatus->id }} <br>
        Nome: {{ $courseStatus->name }} <br>
        Data de cadastro: {{ \Carbon\Carbon::parse($courseStatus->created_at)-> format('d/m/Y H:i:s')}} <br>
        Data de atualização: {{ \Carbon\Carbon::parse($courseStatus->updated_at)-> format('d/m/Y H:i:s')}} <br>
        
@endsection
