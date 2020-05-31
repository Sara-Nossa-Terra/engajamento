@extends('adminlte::page')

@section('title', 'Cadastrar Atividades')

@section('content')

    <div class="card card-gray">
        <div class="card-header">
            <h3 class="card-title">Formulário de Atividades</h3>
        </div>
        <form method="POST" action="{{ route('atividades.update', $atividades->id) }}"
              class="form-horizontal">
            @method('PUT')
            @include('atividades._partials.formulario')
        </form>
    </div>
@stop
