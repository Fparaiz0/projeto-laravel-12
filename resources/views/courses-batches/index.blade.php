<div>
    <h2>Listar os lotes do curso!</h2>

    @if (@session('success'))
    <p style="color: #082">
        {{ session('success') }}
    </p>
    @endif
    <a href="{{ route('courses-batches.create') }}">Cadastrar</a>
</div>