@extends('adminlte::page')

@section('title', 'Cadastrar Pessoas Ajudadas')

@section('content')

    <div class="card card-gray">
        <div class="card-header">
            <h3 class="card-title">Formulário de Pessoas Ajudadas</h3>
        </div>
        <form method="POST" action="{{ route('pessoasajudadas.update', $pessoasAjudadas->id) }}"
              class="form-horizontal">
            @method('PUT')
            @include('pessoasajudadas._partials.formulario')
        </form>
    </div>
@stop
