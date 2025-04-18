<div>
    <h2>Listar as aulas!</h2>

    @if (@session('success'))
    <p style="color: #082">
        {{ session('success') }}
    </p>
    @endif
    <a href="{{ route('lessons.create') }}">Cadastrar</a>
</div>