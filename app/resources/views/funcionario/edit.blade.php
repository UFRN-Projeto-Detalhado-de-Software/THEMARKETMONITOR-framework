<html>
<head></head>
<body>
<h1>Editar funcionários:</h1>

<form action="/funcionario/edited/{{$id}}" method="POST">
    @csrf
    <p>
        <label>
            Nome:
            <input type="text" id="nome" name="nome" placeholder={{$funcionario->nome}}>
        </label>
    </p>
    <p>
        <label>
            Data de nascimento:
            <input type="text" id="data" name="data" placeholder={{$funcionario->dataDeNascimento}}
            value={{$funcionario->dataDeNascimento}}>
        </label>
    </p>
    <p>
        <label>
            Email:
            <input type="text" id="email" name="email" placeholder={{$funcionario->email}}
            value={{$funcionario->email}}>
        </label>
    </p>
    <p>
        <label>
            Telefone:
            <input type="number" id="telefone" name="telefone" placeholder={{$funcionario->telefone}}
            value={{$funcionario->telefone}}>
        </label>
    </p>
    <p>
        <label>
            Cpf:
            <input type="number" id="cpf" name="cpf" placeholder={{$funcionario->cpf}}
            value={{$funcionario->cpf}}>
        </label>
    </p>
    <input type="submit" value="Salvar mudanças">
</form>

<br>



</body>
</html>
