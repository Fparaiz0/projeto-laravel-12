<div>
    <h2>Cadastrar os usuários!</h2>

    <a href="{{ route('users.index') }}">Listar</a><br><br>

    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        @method('POST')

        <label>Nome: </label>
        <input type="text" name="name" id="name" placeholder="Nome do usuário" required><br><br>

        <label>Email: </label>
        <input type="email" name="email" id="email" placeholder="Email do usuário" required><br><br>

        <label>Senha: </label>
        <input type="password" name="password" id="password" placeholder="Senha" required><br><br>

        <button type="submit">Cadastrar</button>
    </form>
</div>
