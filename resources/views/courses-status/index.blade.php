<div>
    <h2>Listar os status do curso!</h2>

    @if (@session('success'))
    <p style="color: #082">
        {{ session('success') }}
    </p>
    @endif
    <a href="{{ route('courses-status.create') }}">Cadastrar</a>
</div>