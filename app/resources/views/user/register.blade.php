<html>
<head></head>
<body>

@if(session('msg'))
    <p>{{session('msg')}}</p>
@endif

<h1>Sign in:</h1>

<form action="{{route('perfil.register.do')}}" method="POST">
    @csrf
    <p>
        <label>
            Nome de usuário:
            <input type="text" id="nome" name="nome" placeholder="Nome de usuário">
        </label>
    </p>
    <p>
        <label>
            Email:
            <input type="email" id="email" name="email" placeholder="Email">
        </label>
    </p>
    <p>
        <label>
            Senha:
            <input type="password" id="senha" name="senha" placeholder="Senha">
        </label>
    </p>
    <p>
        <label>
            Confirmar senha:
            <input type="password" id="confirmar_senha" name="confirmar_senha"
                   placeholder="Confirmar senha">
        </label>
    </p>
    <input type="submit" value="Cadastrar">
</form>


</body>
</html>
