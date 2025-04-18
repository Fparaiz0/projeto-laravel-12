@extends('layouts.admin')

@section('content')
    <h2>Listar os cursos!</h2>

    <x-alert/>

    <a href="{{ route('courses.create') }}">Cadastrar os cursos</a><br><br>

    {{-- Imprimir os registros --}}
    @forelse ($courses as $course)
        ID: {{ $course->id }} <br>
        Nome: {{ $course->name }} <br>
        <hr>
    @empty
        
    @endforelse
@endsection
