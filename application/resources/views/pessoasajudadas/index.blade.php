@extends('adminlte::page')

@section('title', 'Pessoas Ajudadas')

@section('content_header')
    <h1>Lista de Pessoas Ajudadas   </h1>
@stop

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Pessoas Ajudadas  {{ auth()->user()->tx_nome }}  </h3>
                    <div class="card-tools">
                        <a href="{{ route('pessoasajudadas.create') }}" class="btn-novo btn btn-success float-right">
                            <i class="fa fa-plus"></i>&nbsp;Novo
                        </a>
                    </div>
                </div>
                @include('includes.alerts')
                <div class="card-body" id="container_conteudo">
                    <table  id="table" class="table table-striped table-hover table-bordered ">
                        <thead class="thead-light">
                        <tr>
                            <th style="width: 15%">Ações</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Data de Nascimento</th>
                            <th scope="col">Telefone</th>
                            <th scope="col">Líder</th>
                        </tr>
                        </thead>
                        <tbody id="container_pessoas_ajudadas">
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
    <script>
        /*
        *
        * Classe com todos os métodos para listar os dados de pessoas ajudadas
        *
        * */
        class PessoasAjudadas {
            lista = [];
            url=   "http://localhost:8000/listar-pessoas-ajudadas"
            itemTemplate = ""

            /*
            *
            * Faz a requisição e armazena as pessoas ajudadas
            *
            * */
            async requisitar() {
                try {
                    const response =  await fetch(this.url);
                    this.lista = await response.json();
                } catch (err) {
                    this.handlerFalhar();
                }
            }

            /*
            *
            * Lista todas as pessoas ajudadas na DOM
            *
            * */
            async listar() {
                this.lista.forEach(pessoaAjudada => {
                    // Formatar data nascimento
                    const dtNascimento = new Date(pessoaAjudada.dt_nascimento);
                    const dtNascimentoFormatada = `${dtNascimento.getDate()}/${dtNascimento.getMonth() + 1}/${dtNascimento.getFullYear()}`

                    // Formatar data
                    pessoaAjudada.nu_telefone = pessoaAjudada.nu_telefone.replace(".", " ");
                    const pessoaAjudadaId = pessoaAjudada.id;

                    const pessoaAjudadaElemento = $(`
                        <tr class="pessoa_ajudada">
                            <td>
                                <a href="${`/pessoasajudadas/${pessoaAjudadaId}/edit`}"
                                   class="btn btn-primary pessoa_ajudada_link" title="Editar">
                                    <span class="fa fa-edit"></span>
                                </a>
                                <a href="${`/pessoasajudadas/${pessoaAjudadaId}/destroy`}"
                                   class="btn btn-danger link-excluir" title="Excluir">
                                    <span class="fa fa-trash"></span>
                                </a>
                            </td>
                            <td>${pessoaAjudada.tx_nome} </td>
                            <td> ${dtNascimentoFormatada} </td>
                            <td> ${pessoaAjudada.nu_telefone}  </td>
                            <td> {{ auth()->user()->tx_nome }}  </td>
                        </tr>
                    `);


                    // Adiciona a pessoa ajudada ao final da tabela
                    $("#container_pessoas_ajudadas").append(pessoaAjudadaElemento);
                })
            }

            handlerFalhar() {
                const errorElement = document.createElement("div");

                // remove tabela
                const table = document.getElementById("table");
                table.remove();

                // estilização
                errorElement.innerText = "Ocorreu um erro ao mostrar as pessoas ajudadas. Atualize a página e tente novamente.";
                errorElement.className = "alert alert-danger";

                // add erro na DOM
                const container = document.getElementById("container_conteudo");
                container.appendChild(errorElement);
            }
        }

        window.addEventListener("load", async () =>  {
            const pessoasAjudadas = new PessoasAjudadas();
            await pessoasAjudadas.requisitar()
            await pessoasAjudadas.listar();
        });
    </script>
@stop
