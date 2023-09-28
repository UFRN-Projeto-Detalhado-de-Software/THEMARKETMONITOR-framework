@if (session()->has('message'))
    {{ session()->get('message') }}
@endif

<html>
<head></head>
<body>
<h1>Editar Meios de Pagamento:</h1>

<form action="{{route('meiopagamento.update', ['meiopagamento' => $meiopagamento->id])}}" method="POST">

    @csrf
    <p>

        <label>
            Nome:
            <input type="hidden" name="_method" value="PUT">
            <input type="text" name="nome_meiopagamento" placeholder={{$meiopagamento->nome_meiopagamento}} value={{$meiopagamento->nome_meiopagamento}}>
        </label>
    </p>
    <p>
        <label>
            ID:
            <input type="number"  name="id" placeholder={{$meiopagamento->id}}
            value={{$meiopagamento->id}}>
        </label>
    </p>

    <input type="submit" value="Salvar mudanças">
</form>

<br>



</body>
</html>
