@extends('layouts.main')

@section('title', 'Historico')

@section('content')



@if(session('msg'))
    <p>
    <h2>{{session('msg')}}</h2>
    </p>
@endif


<div class="content">
    <h1>Lista de metas do funcionário {{$funcionario->nome}}:</h1>

    @foreach($metas as $meta)
        @php
            $periodo = $meta->periodo()->get()->first();
        @endphp
        <p>Data de início: {{ date('d/m/y', strtotime($periodo->data_inicio))}}</p>
        <p>Data de termino: {{ date('d/m/y', strtotime($periodo->data_fim))}}</p>
        <p>Valor da meta: {{$meta->valor_meta}}</p> {{--todo: talvez arrumar aqui a formatação--}}
        <p>Porcentagem de conclusão: {{$meta->valor_atual / ($meta->valor_meta * 100)}}%</p>

        {{--    <p>Tipo da meta: {{$meta->metable->nome}}</p>--}}


        <br>
    @endforeach

    <br>
</div>
