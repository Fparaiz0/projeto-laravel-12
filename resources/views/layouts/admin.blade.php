<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Projeto</title>
</head>

<body>
    
    @can('dashboard')
        <a href="{{ route('dashboard.index') }}">Dashboard</a><br>
    @endcan

    @can('index-course')
        <a href="{{ route('courses.index') }}">Cursos</a><br>
    @endcan

    @can('index-course-status')
        <a href="{{ route('course_statuses.index') }}">Status Cursos</a><br>
    @endcan

    @can('index-user')
        <a href="{{ route('users.index') }}">Usuários</a><br>
    @endcan

    @can('index-user-status')
        <a href="{{ route('user_statuses.index') }}">Status Usuários</a><br>
    @endcan

    @can('index-role')
        <a href="{{ route('roles.index') }}">Papéis</a><br>
    @endcan

    @can('show-profile')
        <a href="{{ route('profile.show') }}">Perfil</a><br>
    @endcan

    <a href="{{ route('logout') }}">Sair</a><br>

    @yield('content')

</body>

</html>
