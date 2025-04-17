<div>
    <h2>Listar os status!</h2>

    @if (@session('success'))
    <p style="color: #082">
        {{ session('success') }}
    </p>
    @endif

    <a href="{{ route('status.create') }}">Cadastrar</a>
</div>
