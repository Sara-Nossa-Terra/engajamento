@extends('adminlte::page')

@section('title', 'Cadastrar Líderes')

@section('content')

    <div class="card card-gray">
        <div class="card-header">
            <h3 class="card-title">Formulário de Líderes</h3>
        </div>
        <form method="POST" action="{{ route('lideres.update', $lideres->id) }}" class="form-horizontal">
            @method('PUT')
            @include('lideres._partials.formulario')
        </form>
    </div>
@stop
