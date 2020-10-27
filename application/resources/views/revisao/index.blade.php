@extends('adminlte::page')

@section('title', 'Revisão')

@section('content_header')
    <h1>Lista de Revisão</h1>
@stop

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Revisões</h3>
                    <div class="card-tools">
                        <a href="{{ route('revisao.create') }}" class="btn-novo btn btn-success float-right">
                            <i class="fa fa-plus"></i>&nbsp;Novo
                        </a>
                    </div>
                </div>
                @include('includes.alerts')
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th style="width: 15%">Ações</th>
                            <th>Data de Revisão</th>
                            <th>Data de Cadastro</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($revisoes as $revisao)
                            <tr>
                                <td>
                                    <a href="{{ route('revisao.edit', $revisao->id) }}"
                                       class="btn btn-primary" title="Editar">
                                        <span class="fa fa-edit"></span>
                                    </a>
                                    <a href="{{ route('revisao.delete', $revisao->id) }}"
                                       class="btn btn-danger link-excluir" title="Excluir">
                                        <span class="fa fa-trash"></span>
                                    </a>
                                </td>
                                <td>{{ \Carbon\Carbon::parse($revisao->dt_revisao)->format('d/m/Y') }}</td>
                                <td>{{ \Carbon\Carbon::parse($revisao->dt_cadastro)->format('d/m/Y') }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer clearfix">
                    <ul class="pagination pagination-sm m-0 float-right">
                        {{ $revisoes->links() }}
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
