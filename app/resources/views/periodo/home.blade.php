<html>
<head></head>
<body>

@if(session('msg'))
    <p>
        <h2>{{session('msg')}}</h2>
    </p>
@endif

<h1>Lista de períodos:</h1>

@foreach($periodos as $periodo)
    <p>Tipo: {{$periodo->tipo()->first()->nome}}</p>
    <p>Data de início: {{ date('d/m/y', strtotime($periodo->data_inicio))}}</p>
    <p>Data de termino: {{ date('d/m/y', strtotime($periodo->data_fim))}}</p>

    <a href="{{route('periodo.formEdit', ['periodo' => $periodo->id])}}">Editar período</a>

    <form action="{{route('periodo.destroy', ['periodo' => $periodo->id])}}" method="POST">
        @csrf
        @method('DELETE')
        <input type="hidden" name="id" value="{{$periodo->id}}">
        <input type="submit" value="Deletar período">
    </form>

    <br>
@endforeach

<br>
<a href="{{route('periodo.create')}}">Criar período</a>

</body>
</html>
