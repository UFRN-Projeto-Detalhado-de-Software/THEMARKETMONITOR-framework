<html>
<head></head>
<body>

@if(session('msg'))
    <p>{{session('msg')}}</p>
@endif

<h1>Relacione o usuário com o funcionário</h1>

@foreach($usuarios as $usuario)

    <p>Nome do usuário: {{$usuario->nome}}</p>
    @php
        $funcionario = \App\Models\Funcionario::find($usuario->funcionario);
    @endphp
    @if($funcionario)
        <p>Nome do funcionário relacionado: {{$funcionario->nome}}</p>
    @else
        <p>Usuário sem funcionário!</p>
    @endif

    <a href="{{route('perfil.edit_funcionario', ['user' => $usuario->id])}}">Editar usuário</a>

    <form action="{{route('perfil.destroy', ['user' => $usuario->id])}}" method="POST">
        @csrf
        @method('DELETE')
        <input type="hidden" name="id" value="{{$usuario->id}}">
        <input type="submit" value="Deletar usuário">
    </form>

    <br>
@endforeach

<br>
<a href="{{route('perfil.home')}}">Voltar para a home</a>


</body>
</html>
