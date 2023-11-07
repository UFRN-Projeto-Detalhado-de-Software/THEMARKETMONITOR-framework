@extends('layouts.main')

@section('title', 'Vendas')

@section('content')

    <div class="content">
        <a href="{{route('vendas.create')}}">Create</a>

        <h2> Vendas</h2>

        <ul>
            @foreach( $vendas as $venda)
                <?php
                 $closer = \App\Models\Funcionario::find($venda->closer);
                 $sdr = \App\Models\Funcionario::find($venda->sdr);
                         ?>
                <li>{{$venda->id}} |{{$venda->valor}}|{{$closer->nome}}| {{$venda->cliente}}|{{$sdr->nome}}|{{$venda->obs}} | <a href="{{route('vendas.edit', ['venda' =>$venda->id ])}}">Edit</a>  | <a href="{{route('vendas.show', ['venda'=>$venda->id ])}}">Mostrar</a></li>
            @endforeach
        </ul>
    </div>





@endsection

