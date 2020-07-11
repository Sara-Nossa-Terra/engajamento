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
                        </tr>
                        </thead>
                        <tbody class="lista-atividades"></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(function () {
            $.ajax({
                type: 'GET',
                url: "{{ route('atividades.index') }}",
                dataType: "json",
                success: function (response) {
                    var tabela = '';

                    $.each(response, function (index, atividade) {
                        tabela += '<tr>\n';
                        tabela += '<td>\n';
                        tabela += `<a href='atividades/${atividade.id}/edit'\n`+
                        ' class="btn btn-primary" title="Editar">\n' +
                        '<span class="fa fa-edit"></span></a>';
                        tabela += `<a href='atividades/${atividade.id}/destroy'\n`+
                        ' class="btn btn-danger link-excluir" title="Excluir">\n' +
                        '<span class="fa fa-trash"></span></a>';
                        tabela += '</td>\n';
                        tabela += `<td>${atividade.tx_nome}</td>\n`;
                        tabela += `<td>${atividade.dt_dia}</td>\n`;
                        tabela += '</tr>\n';
                    });
                    $('.lista-atividades').html(tabela);
                }
            });
        });
    </script>
@stop
