@extends('adminlte::page')
@section('title', 'Atividades')
@section('content_header')
<h1>Lista de Atividades</h1>
@stop @section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Atividades</h3>
                <div class="card-tools">
                    <a
                        href="{{ route('atividades.create') }}"
                        class="btn-novo btn btn-success float-right"
                    >
                        <i class="fa fa-plus"></i>&nbsp;Novo
                    </a>
                </div>
            </div>
            @include('includes.alerts')
            <div class="card-body" id="container_conteudo">
                <table id="table" class="table table-striped table-hover table-bordered">
                    <thead class="thead-light">
                        <tr>
                            <th>Ações</th>
                            <th scope="col">Nome da Atividade</th>
                            <th scope="col">Dia</th>
                        </tr>
                    </thead>
                    <tbody id="container_lista_atividades"></tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>
    class Atividade {
        url = "{{ route('atividades.lista') }}";
        atividades = [];

        async requisitar() {
            try {
                const response = await fetch(this.url);
                var atividadesJson = await response.json();
                this.atividades = atividadesJson.data;
            } catch (err) {
                this.handlerFalhar(err);
            }
        }
        async listar() {
            this.atividades.forEach(atividade => {
                const atividadesElemento = $(`
                        <tr class="atividade">
                            <td>
                                <a href="${`/atividades/${atividade.id}/edit`}"
                                   class="btn btn-primary pessoa_ajudada_link" title="Editar">
                                    <span class="fa fa-edit"></span>
                                </a>
                                <a href="${`/atividades/${atividade.id}/destroy`}"
                                   class="btn btn-danger link-excluir" title="Excluir">
                                    <span class="fa fa-trash"></span>
                                </a>
                            </td>
                            <td>${atividade.tx_nome} </td>
                            <td> ${atividade.dt_dia} </td>
                        </tr>
                    `);

                $("#container_lista_atividades").append(atividadesElemento);
            })
        }

        handlerFalhar() {
            const errorElement = document.createElement("div");

            const table = document.getElementById("table");
            table.remove();

            errorElement.innerText = "Ocorreu um erro ao mostrar as pessoas ajudadas. Atualize a página e tente novamente.";
            errorElement.className = "alert alert-danger";

            const container = document.getElementById("container_conteudo");
            container.appendChild(errorElement);
        }

    }

    window.addEventListener("load", async () => {
        const atividade = new Atividade();

        await atividade.requisitar();
        await atividade.listar();
    });
</script>
@stop
