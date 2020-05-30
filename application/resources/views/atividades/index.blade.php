@extends('adminlte::page')

@section('title', 'Atividades')

@section('content_header')
    <h1>Lista de Atividades</h1>
@stop

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Atividades</h3>
                    <div class="card-tools">
                        <a href="{{ route('atividades.create') }}" class="btn-novo btn btn-success float-right">
                            <i class="fa fa-plus"></i>&nbsp;Novo
                        </a>
                    </div>
                </div>
                @include('includes.alerts')
                <div class="card-body">
                    <table class="table table-striped table-hover table-bordered ">
                        <thead class="thead-light">
                        <tr>
                            <th>Ações</th>
                            <th scope="col">Nome da Atividade</th>
                            <th scope="col">Dia</th>
                            <th scope="col">Hora</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($aItens as $ativiade)
                            <tr>
                                <td>
                                    <a href="{{ route('atividades.edit', base64_encode($ativiade->id)) }}"
                                       class="btn btn-primary" title="Editar">
                                        <span class="fa fa-edit"></span>
                                    </a>
                                    <a href="{{ route('atividades.delete', base64_encode($ativiade->id)) }}"
                                       class="btn btn-danger link-excluir" title="Excluir">
                                        <span class="fa fa-trash"></span>
                                    </a>
                                </td>
                                <td>{{ $ativiade->tx_nome }}</td>
                                <td>{{ $ativiade->tx_dia }}</td>
                                {{-- @todo Adicionar formatacao com carbon para o exibicao de telefone --}}
                                <td>{{ $ativiade->tx_hora }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer clearfix">
                    <ul class="pagination pagination-sm m-0 float-right">
                        {{ $aItens->links() }}
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
