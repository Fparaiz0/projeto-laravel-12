@extends('layouts.admin')

@section('content')
    <h2>Permissões do Papel</h2>

    @can('index-role')
        <a href="{{ route('roles.index') }}">Listar</a><br><br>
    @endcan

    <x-alert />

    {{-- Imprimir os registros --}}
    @forelse ($permissions as $permission)
        ID: {{ $permission->id }}<br>
        Nome: {{ $permission->name }}<br>
        Papel: {{{ $role->name }}}<br>

        @if (in_array($permission->id, $rolePermissions ?? []))
            <span style="color: #086">Liberado</span>
        @else
            <span style="color: #f00">Bloqueado</span>
        @endif
        <hr>
    @empty
        Nenhum registro encontrado!
    @endforelse
@endsection