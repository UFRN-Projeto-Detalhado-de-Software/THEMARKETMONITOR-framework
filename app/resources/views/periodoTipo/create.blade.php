<html>
<head></head>
<body>
<h1>Crie um tipo de período</h1>

<form action="{{route('periodo.tipo.store')}}" method="POST">
    @csrf
    <p>
        <label>
            Nome:
            <input type="text" id="nome" name="nome" placeholder="nome">
        </label>
    </p>
    <p>
        <label>
            Duração (em dias):
            <input type="number" id="duracao" name="duracao" placeholder="quantidade de dias">
        </label>
    </p>
    <input type="submit" value="Enviar">
</form>


</body>
</html>
