<html>
<head></head>
<body>
<h1>Crie uma meta</h1>

<form action="{{route('meta.store')}}" method="POST">
    @csrf
    <div>
        <h2>Período</h2>
        <p>
            Selecione um tipo de período:
            <select class="form-select" aria-label="Default select example" name="tipo_periodo">
                <option selected>Escolha o tipo do período</option>
                @foreach($tipos_periodo as $tipo)
                    <option value="{{$tipo->id}}"> {{$tipo->nome}} </option>
                @endforeach
            </select>
        </p>
        <p>
            <label>
                Início:
                <input type="date" id="data_inicio" name="data_inicio" placeholder="data de início da meta" value="{{now()}}">
            </label>
        </p>
    </div>

    <label>
        Valor da meta
        <input type="number" id="valor_meta" name="valor_meta" placeholder="valor da meta">
    </label>


{{--    <p>--}}
{{--        Selecione um tipo de meta: --}}
{{--        <select class="form-select" aria-label="Default select example" name="tipo_periodo">--}}
{{--            <option selected>Escolha o tipo de meta</option>--}}
{{--            @foreach($tipos_meta as $tipo)--}}
{{--                <option value="{{$tipo->id}}"> {{$tipo->nome}} </option>--}}
{{--            @endforeach--}}
{{--        </select>--}}
{{--    </p>--}}
{{--    --}}
{{--    <p>--}}
{{--        Selecione o responsavel da meta: --}}
{{--        <select class="form-select" aria-label="Default select example" name="tipo_periodo">--}}
{{--            <option selected>Escolha o responsavel</option>--}}
{{--            @foreach($responsaveis as $responsavel)--}}
{{--                <option value="{{$responsavel->id}}"> {{$responsavel->nome}} </option>--}}
{{--            @endforeach--}}
{{--        </select>--}}
{{--    </p>--}}

    <input type="submit" value="Enviar">
</form>


</body>
</html>
