<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Projeto</title>

    </head>
    <body>
        <h1>Bem-vindo ao Projeto!</h1>
        <a href="{{ route('courses.index') }}">Listar os cursos</a><br>
        <a href="{{ route('users.index') }}">Listar os usuários</a><br>
        <a href="{{ route('status.index') }}">Listar os status</a><br>
    </body>
</html>
