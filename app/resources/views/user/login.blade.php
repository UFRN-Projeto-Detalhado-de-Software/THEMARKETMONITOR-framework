<html>
<head></head>
<body>

@if(session('msg'))
    <p>{{session('msg')}}</p>
@endif

<h1>Log in:</h1>

<form action="{{route('perfil.login.do')}}" method="POST">
    @csrf
    <p>
        <label>
            Email:
            <input type="email" id="email" name="email" placeholder="digite aqui seu email">
        </label>
    </p>
    <p>
        <label>
            Senha:
            <input type="password" id="senha" name="senha" placeholder="digite aqui sua senha">
        </label>
    </p>
    <input type="submit" value="Entrar">
</form>

{{-- todo: redirecionar para signIn--}}

</body>
</html>
