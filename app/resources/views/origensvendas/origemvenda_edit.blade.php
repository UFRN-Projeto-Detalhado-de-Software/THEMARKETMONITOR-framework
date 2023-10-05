@if (session()->has('message'))
    {{ session()->get('message') }}
@endif
<html>
<head></head>
<body>
<h1>Editar Origens de Vendas:</h1>

<form action="{{route('origemvenda.update', ['origemvenda' => $origemdavenda->id])}}" method="POST">

    @csrf
    <p>

        <label>
            Nome:
            <input type="hidden" name="_method" value="PUT">
            <input type="text" name="nome_origem" placeholder={{$origemdavenda->nome_origem}} value={{$origemdavenda->nome_origem}}>
        </label>
    </p>
    <p>
        <label>
            ID:
            <input type="number"  name="id" placeholder={{$origemdavenda->id}}
            value={{$origemdavenda->id}}>
        </label>
    </p>

    <input type="submit" value="Salvar mudanças">
</form>

<br>



</body>
</html>

