<div>
    <h2>Listar os cursos!</h2>

@if (@session('success'))
    <p style="color: #082">
        {{ session('success')}}
    </p>
@endif
    <a href="{{ route('courses.create') }}">Cadastrar Cursos</a>
</div>
