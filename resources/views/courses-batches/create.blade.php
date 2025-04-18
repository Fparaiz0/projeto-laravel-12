<div>
    <h2>Cadastrar os lotes dos cursos!</h2>

    <a href="{{ route('courses-batches.index') }}">Listar</a><br><br>

    <form action="{{ route('courses-batches.store') }}" method="POST">
        @csrf
        @method('POST')

        <label>Nome do lote: </label>
        <input type="text" name="name" id="name" placeholder="Nome do lote" required><br><br>

        <button type="submit">Cadastrar</button>
    </form>
</div>
