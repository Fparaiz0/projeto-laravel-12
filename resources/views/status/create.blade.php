<div>
    <h2>Cadastrar os status!</h2>

    <form action="{{ route('status.store') }}" method="POST">
        @csrf
        @method('POST')

        <label>Nome: </label>
        <input type="text" name="name" id="name" placeholder="Nome do usuário" required><br><br>

        <button type="submit">Cadastrar</button>
</div>
