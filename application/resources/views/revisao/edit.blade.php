@extends('adminlte::page')

@section('title', 'Cadastrar Revisão de Vidas')

@section('content')

    <div class="card card-gray">
        <div class="card-header">
            <h3 class="card-title">Formulário de Revisão de Vidas</h3>
        </div>
        <form method="POST" action="{{ route('revisao.update', $revisao->id) }}"
              class="form-horizontal">
            @method('PUT')
            @include('revisao._partials.formulario')
        </form>
    </div>
@stop
