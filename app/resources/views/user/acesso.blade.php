<html>
<head></head>
<body>

@if(session('msg'))
    <p>
    <h2>{{session('msg')}}</h2>
    </p>
@endif

<h1>Lista de funcionários que você tem acesso:</h1>

@foreach($funcionarios as $funcionario)
    <p>Nome: {{$funcionario->nome}}</p>
    <p>Data de nascimento: {{date('d/m/y', strtotime($funcionario->dataDeNascimento))}}</p>
    <p>Email: {{$funcionario->email}}</p>
    <p>Telefone: {{$funcionario->telefone}}</p>
    <p>CPF: {{$funcionario->cpf}}</p>

    <br>
@endforeach

<br>
<a href="{{route('perfil.home')}}">Voltar para a home</a>

</body>
</html>
