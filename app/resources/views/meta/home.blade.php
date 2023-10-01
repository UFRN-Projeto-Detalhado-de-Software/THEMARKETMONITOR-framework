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
        $periodo = \App\Models\Periodo::find($meta->periodo);
    @endphp
    <p>Data de início: {{ date('d/m/y', strtotime($periodo->data_inicio))}}</p>
    <p>Data de termino: {{ date('d/m/y', strtotime($periodo->data_fim))}}</p>
    <p>Valor da meta: {{$meta->valor_meta}}</p> {{--todo: talvez arrumar aqui a formatação--}}
{{--    <p>Tipo da meta: {{$meta->metable->nome}}</p>--}}
{{--    <p>Responsavel da meta: {{$meta->responsavel_meta->nome}}</p>--}}

    <a href="{{route('meta.formEdit', ['meta' => $meta->id])}}">Editar meta</a>
    <form action="{{route('meta.destroy', ['meta' => $meta->id])}}" method="POST">
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
