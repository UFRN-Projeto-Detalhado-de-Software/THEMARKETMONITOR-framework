<html>
<head></head>
<body>
<h1>Lista de funcionários:</h1>

@foreach($funcionarios as $funcionario)
    <p>Nome: {{$funcionario->nome}}</p>
    <p>Data de nascomento: {{$funcionario->dataDeNascimento}}</p>
    <p>Email: {{$funcionario->email}}</p>
    <p>Telefone: {{$funcionario->telefone}}</p>
    <p>CPF: {{$funcionario->cpf}}</p>

    <a href="/funcionario/edit/{{$funcionario->id}}">Editar funcionário</a>
    <a href="/funcionario/deleted/{{$funcionario->id}}">Deletar funcionário</a>

    <br>
@endforeach

<br>
<a href="/funcionario/create">Criar funcionário</a>

</body>
</html>
