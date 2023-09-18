<html>
<head></head>
<body>
<h1>Crie um funcionário</h1>

<form action="/funcionario/recebido" method="POST">
    @csrf
    <p>
        <label>
            Nome:
            <input type="text" id="nome" name="nome" placeholder="Nome do funcionário">
        </label>
    </p>
    <p>
        <label>
            Data de nascimento:
            <input type="text" id="data" name="data" placeholder="Data de nascimento do funcionário">
        </label>
    </p>
    <p>
        <label>
            Email:
            <input type="text" id="email" name="email" placeholder="Email do funcionário">
        </label>
    </p>
    <p>
        <label>
            Telefone:
            <input type="number" id="telefone" name="telefone" placeholder="Telefone do funcionário">
        </label>
    </p>
    <p>
        <label>
            Cpf:
            <input type="number" id="cpf" name="cpf" placeholder="CPF do funcionário">
        </label>
    </p>
    <input type="submit" value="Enviar">
</form>


</body>
</html>
