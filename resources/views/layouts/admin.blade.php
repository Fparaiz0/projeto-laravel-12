<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Projeto</title>
</head>

<body>
    
    <a href="{{ route('courses.index') }}">Listar os cursos</a><br>
    <a href="{{ route('courses-batches.index') }}">Listar os lotes dos cursos</a><br>
    <a href="{{ route('courses-status.index') }}">Listar os status dos cursos</a><br>
    <a href="{{ route('lessons.index') }}">Listar as aulas</a><br>
    <a href="{{ route('modules.index') }}">Listar os módulos</a><br>
    <a href="{{ route('status.index') }}">Listar os status</a><br>
    <a href="{{ route('users.index') }}">Listar os usuários</a><br>
    @yield('content')

</body>

</html>