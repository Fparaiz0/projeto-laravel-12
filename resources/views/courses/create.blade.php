<div>
    <h2>Cadastrar o curso</h2>

    <form action="{{ route('courses.store') }}" method="POST">
        @csrf
        @method('POST')

        <label>Nome</label>
        <input type="text" name="name" id="name" placeholder="Nome do curso" required><br><br>

        <button type="submit">Cadastrar</button>
    </form>
</div>
