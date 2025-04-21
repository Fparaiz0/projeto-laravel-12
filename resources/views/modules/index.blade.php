@extends('layouts.admin')

@section('content')
    <h2>Listar os módulos!</h2>

    <x-alert/> 
    
    <a href="{{ route('modules.create') }}">Cadastrar</a><br><br>

    {{-- Imprimir os registros --}}
    @forelse ($modules as $module)
        ID: {{ $module->id }} <br>
        Nome: {{ $module->name }} <br>
        <a href="{{ route('modules.show', ['module' => $module->id]) }}">Visualizar</a><br>
        <a href="{{ route('modules.edit', ['module' => $module->id]) }}">Editar</a>

        <form action="{{ route('modules.destroy', ['module' => $module->id]) }}" method="POST">
            @csrf
            @method('delete')
            <button type="submit" onclick="return confirm('Tem certeza que deseja apagar este registro?')">Apagar</button>
        </form>
        <hr>
    @empty
        Nenhum registro encontrado!
    @endforelse

    {{-- Paginação --}}
    {{ $modules->links() }}
@endsection