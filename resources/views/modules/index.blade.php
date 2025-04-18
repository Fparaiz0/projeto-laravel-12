<div>
    <h2>Listar os módulos!</h2>

    @if (@session('success'))
    <p style="color: #082">
        {{ session('success') }}
    </p>
    @endif
    <a href="{{ route('modules.create') }}">Cadastrar</a>
</div>