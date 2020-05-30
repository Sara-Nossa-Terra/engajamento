@extends('adminlte::page')

@section('title', 'Pessoas Ajudadas')

@section('content_header')
    <h1>Lista de Pessoas Ajudadas</h1>
@stop

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Pessoas Ajudadas</h3>
                    <div class="card-tools">
                        <a href="{{ route('pessoasajudadas.create') }}" class="btn-novo btn btn-success float-right">
                            <i class="fa fa-plus"></i>&nbsp;Novo
                        </a>
                    </div>
                </div>
                @include('includes.alerts')
                <div class="card-body">
                    <table class="table table-striped table-hover table-bordered ">
                        <thead class="thead-light">
                        <tr>
                            <th style="width: 15%">Ações</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Data de Nascimento</th>
                            <th scope="col">Telefone</th>
                            <th scope="col">Líder</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($pessoasAjudadas as $pAjudadas)
                            <tr>
                                <td>
                                    <a href="{{ route('pessoasajudadas.edit', base64_encode($pAjudadas->id)) }}"
                                       class="btn btn-primary" title="Editar">
                                        <span class="fa fa-edit"></span>
                                    </a>
                                    <a href="{{ route('pessoasajudadas.delete', base64_encode($pAjudadas->id)) }}"
                                       class="btn btn-danger link-excluir" title="Excluir">
                                        <span class="fa fa-trash"></span>
                                    </a>
                                </td>
                                <td>{{ $pAjudadas->tx_nome }}</td>
                                <td>{{ \Carbon\Carbon::parse($pAjudadas->dt_nascimento)->format('d/m/Y') }}</td>
                                <td>{{ $pAjudadas->nu_telefone }}</td>
                                <td>{{ $pAjudadas->lider->tx_nome }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer clearfix">
                    <ul class="pagination pagination-sm m-0 float-right">
                        {{ $pessoasAjudadas->links() }}
                    </ul>
                </div>
            </div>
        </div>
    </div>
@stop
