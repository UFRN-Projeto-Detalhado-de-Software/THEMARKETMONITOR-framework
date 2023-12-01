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
                <input type="date" id="data_inicio" name="data_inicio">
            </label>
        </p>
    </div>

    <label>
        Quantidade de vendas
        <input type="number" id="vendas_meta" name="vendas_meta" placeholder="quantidade de vendas da meta">
    </label>



    <input type="submit" value="Enviar">
</form>


</body>
</html>
