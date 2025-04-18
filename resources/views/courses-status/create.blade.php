<div>
    <h2>Cadastrar os status dos cursos!</h2>

    <form action="{{ route('courses-status.store') }}" method="POST">
        @csrf
        @method('POST')

        <label>Nome do status: </label>
        <input type="text" name="name" id="name" placeholder="Nome do status" required><br><br>

        <button type="submit">Cadastrar</button>
    </form>
</div>