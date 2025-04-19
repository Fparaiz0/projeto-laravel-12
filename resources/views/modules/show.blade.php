@extends('layouts.admin')

@section('content')
    <h2>Detalhes do módulos</h2>

    <x-alert/>
    
    <a href="{{ route('modules.index') }}">Listar</a><br>
    <a href="{{ route('modules.edit', ['module' => $module->id]) }}">Editar</a><br>

    {{-- Imprimir os registros --}}
        ID: {{ $module->id }} <br>
        Nome: {{ $module->name }} <br>
        Data de cadastro: {{ \Carbon\Carbon::parse($module->created_at)-> format('d/m/Y H:i:s')}} <br>
        Data de atualização: {{ \Carbon\Carbon::parse($module->updated_at)-> format('d/m/Y H:i:s')}} <br>
        
@endsection