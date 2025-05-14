<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Projeto</title>
</head>

<body>
    
    <a href="{{ route('courses.index') }}">Cursos</a><br>
    <a href="{{ route('course_statuses.index') }}">Status Curso</a><br>
    <a href="{{ route('user_statuses.index') }}">Status Usuário</a><br>
    <a href="{{ route('users.index') }}">Usuário</a><br>
    @yield('content')

</body>

</html>