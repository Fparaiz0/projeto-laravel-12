<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Celke</title>
</head>

<body>
    
    <a href="{{ route('courses.index') }}">Cursos</a><br>
    <a href="{{ route('course_statuses.index') }}">Status Cursos</a><br>
    <a href="{{ route('users.index') }}">Usuários</a><br>
    <a href="{{ route('user_statuses.index') }}">Status Usuários</a><br>

    @yield('content')

</body>

</html>
