<html>
<head></head>
<body>

@if(session('msg'))
    <p>
    <h2>{{session('msg')}}</h2>
    </p>
@endif

<h1>Lista de metas:</h1>

@foreach($metas as $meta)
    @php
        $periodo = $meta->periodo;
    @endphp
    <p>Data de início: {{ date('d/m/y', strtotime($periodo->data_inicio))}}</p>
    <p>Data de termino: {{ date('d/m/y', strtotime($periodo->data_fim))}}</p>
    <p>Quantidade de vendas: {{$meta->vendas_meta}}</p> {{--todo: talvez arrumar aqui a formatação--}}
    {{--    <p>Tipo da meta: {{$meta->metable->nome}}</p>--}}
    @if($meta->responsavel != null)
        <p>Responsavel da meta: {{$meta->responsavel->nome}}</p>
    @endif

    <a href="{{route('meta.formEdit', ['id' => $meta->id])}}">Editar meta</a>
    <form action="{{route('meta.destroy', ['id' => $meta->id])}}" method="POST">
        @csrf
        @method('DELETE')
        <input type="hidden" name="id" value="{{$meta->id}}">
        <input type="submit" value="Deletar meta">
    </form>

    <br>
@endforeach

<br>
<a href="{{route('meta.create')}}">Criar meta</a>

</body>
</html>
