<html>
<head></head>
<body>

@if(session('msg'))
    <p>{{session('msg')}}</p>
@endif

<h1>Home do usuário</h1>

<a href="{{route('perfil.logout')}}"> Logout</a>

<p>
    Veja as informações dos funcionários que você tem acesso
    <a href="{{route('perfil.acesso')}}"> ir</a>
</p>


@if($isAdm)
    <a href="{{route('perfil.adm')}}"> Página do adm</a>
@endif

</body>
</html>
