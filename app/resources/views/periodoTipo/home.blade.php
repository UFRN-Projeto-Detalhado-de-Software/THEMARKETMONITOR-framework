<html>
<head></head>
<body>

@if(session('msg'))
    <p>
    <h2>{{session('msg')}}</h2>
    </p>
@endif

<h1>Lista de períodos:</h1>

@foreach($periodoTipos as $periodoTipo)
    <p>Nome: {{$periodoTipo->nome}}</p>
    <p>Duração: {{$periodoTipo->duracao}} dias</p>

    <a href="{{route('periodo.tipo.formEdit', ['periodoTipo' => $periodoTipo->id])}}">Editar período</a>

    <form action="{{route('periodo.tipo.destroy', ['periodoTipo' => $periodoTipo->id])}}" method="POST">
        @csrf
        @method('DELETE')
        <input type="hidden" name="id" value="{{$periodoTipo->id}}">
        <input type="submit" value="Deletar período">
    </form>

    <br>
@endforeach

<br>
<a href="{{route('periodo.tipo.create')}}">Criar período</a>

</body>
</html>
