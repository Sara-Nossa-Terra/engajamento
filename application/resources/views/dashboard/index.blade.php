@extends('adminlte::page') @section('title', 'Dashboard')
@section('content_header')

<link href="{{ asset('css/dashboard.css') }}" rel="stylesheet" />
<!-- Link do CDN MomentJS  -->
<script src="{{ asset('js/moment/moment.min.js') }}"></script>
<script src="{{ asset('js/moment/pt-br.min.js') }}" charset="UTF-8"></script>
@stop @section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card" id="main_card_container">
                <div class="p-2 div_lista_pessoas_ajudadas">
                    <!-- Periodos -->
                    <div class="d-flex justify-content-center mb-2">
                        <div
                            class="btn-group"
                            role="group"
                            aria-label="Basic example"
                        >
                            <button
                                id="botao_voltar_semana"
                                type="button"
                                class="btn btn-sm btn-primary"
                            >
                                <i class="fa fa-angle-double-left"></i>
                            </button>
                            <button
                                id="periodo_atividades"
                                class="btn periodos mx-1 disable"
                            >
                                Carregando...
                            </button>

                            <button
                                id="botao_avancar_semana"
                                type="button"
                                class="btn btn-sm btn-primary"
                            >
                                <i class="fa fa-angle-double-right"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Filtro e atividades da semana (aquele card azul) -->
                    <div class="card p-1 mt-1 bg-info-blue mb-1">
                        <div class="row px-2">
                            <div class="filtro-container col-12 col-lg-6">
                                <input
                                    type="text"
                                    class="form-control mt-1 mb-1"
                                    placeholder="Filtro"
                                    id="home_search"
                                />
                            </div>
                            <div class="cultos col-12 col-lg-6">
                                <div class="row">
                                    <div class="col-4 cultos-info mb-1">
                                        <h6
                                            class="culto-title m-1 text-center text-white"
                                        >
                                            Culto
                                        </h6>
                                        <h6
                                            class="culto-horario m-1 text-white text-center"
                                        >
                                            TER20H
                                        </h6>
                                        <button
                                            type="button"
                                            class="btn btn- text-white btn-sm btn-blue btn-block"
                                        >
                                            1
                                        </button>
                                    </div>
                                    <div class="col-4 cultos-info mb-1">
                                        <h6
                                            class="culto-title m-1 text-center text-white"
                                        >
                                            Culto
                                        </h6>
                                        <h6
                                            class="culto-horario m-1 text-white text-center"
                                        >
                                            TER20H
                                        </h6>
                                        <button
                                            type="button"
                                            class="btn btn- text-white btn-sm btn-blue btn-block"
                                        >
                                            1
                                        </button>
                                    </div>

                                    <div class="col-4 cultos-info mb-1">
                                        <h6
                                            class="culto-title m-1 text-center text-white"
                                        >
                                            Culto
                                        </h6>
                                        <h6
                                            class="culto-horario m-1 text-white text-center"
                                        >
                                            TER20H
                                        </h6>
                                        <button
                                            type="button"
                                            class="btn btn- text-white btn-sm btn-blue btn-block"
                                        >
                                            1
                                        </button>
                                    </div>

                                    <div class="col-4 cultos-info mb-1">
                                        <h6
                                            class="culto-title m-1 text-center text-white"
                                        >
                                            Culto
                                        </h6>
                                        <h6
                                            class="culto-horario m-1 text-white text-center"
                                        >
                                            TER20H
                                        </h6>
                                        <button
                                            type="button"
                                            class="btn btn- text-white btn-sm btn-blue btn-block"
                                        >
                                            1
                                        </button>
                                    </div>

                                    <div class="col-4 cultos-info mb-1">
                                        <h6
                                            class="culto-title m-1 text-center text-white"
                                        >
                                            Culto
                                        </h6>
                                        <h6
                                            class="culto-horario m-1 text-white text-center"
                                        >
                                            TER20H
                                        </h6>
                                        <button
                                            type="button"
                                            class="btn btn- text-white btn-sm btn-blue btn-block"
                                        >
                                            1
                                        </button>
                                    </div>

                                    <div class="col-4 cultos-info mb-1">
                                        <h6
                                            class="culto-title m-1 text-center text-white"
                                        >
                                            Culto
                                        </h6>
                                        <h6
                                            class="culto-horario m-1 text-white text-center"
                                        >
                                            TER20H
                                        </h6>
                                        <button
                                            type="button"
                                            class="btn btn- text-white btn-sm btn-blue btn-block"
                                        >
                                            1
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Atividades -->
                    <div id="lista_de_atividades"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop @section('js')

<script>
    class Lideres {
        url = "{{ route('atividades.filtraratividades') }}";
        urlPessoas = "{{ route('dashboard.listarpessoas') }}";
        lideres = [];
        atividades = [];
        pessoasAjudadas = [];
        dataLideres = new Date();

        constructor() {
            this.dataLideres = new Date();
            moment.locale("pt-br");
        }

        // requisita as pessoas ajudadas
        async requisitar() {
            // imprime loading
            this.loading(true);
            this.setPeriodoNaPagina();

            const dataComecoSemana = moment(this.dataLideres).startOf("week");
            const dataFimSemana = moment(this.dataLideres).endOf("week");

            let dt_begin = moment(dataComecoSemana).format("YYYY-MM-DD");
            let dt_until = moment(dataFimSemana).format("YYYY-MM-DD");

            const pessoasAjudadas = await fetch(
                `${this.url}?dt_begin=${dt_begin}&dt_until=${dt_until}`
            );
            const jsonPessoasAjudadas = await pessoasAjudadas.json();
            this.pessoasAjudadas = jsonPessoasAjudadas.pessoasAjudadas;
            this.atividades = jsonPessoasAjudadas.atividades;
        }

        // lista os lideres no documento
        listar() {
            setTimeout(() => {
                // seta periodo das atividades na página HTML (aqueles entre os meios dos botões avançar e voltar semana)
                const dataComecoSemana = moment(this.dataLideres).startOf(
                    "week"
                );
                const dataFimSemana = moment(this.dataLideres).endOf("week");

                let dt_begin = moment(dataComecoSemana).format("YYYY-MM-DD");
                let dt_until = moment(dataFimSemana).format("YYYY-MM-DD");

                document.getElementById("lista_de_atividades").innerHTML = "";

                if (!this.pessoasAjudadas.length) {
                    this.imprimirMensagemNenhumLiderParaMostrar();
                }

                this.pessoasAjudadas.forEach((pessoaAjudada) => {
                    // Calcula o botão preto com as iniciais do Nome do Lider
                    let iniciaisNome = "";
                    const nome = pessoaAjudada.tx_nome || "";
                    if (nome.split(" ").length <= 1) {
                        const [primeiraLetraNome, segundaLetraNome] = nome;

                        iniciaisNome = primeiraLetraNome + segundaLetraNome;
                    } else {
                        const [primeiroNome, sobrenome] = nome.split(" ");

                        const [primeiraLetraNome] = primeiroNome;
                        const [primeiraLetraSobrenome] = sobrenome;

                        iniciaisNome =
                            primeiraLetraNome + primeiraLetraSobrenome;
                    }

                    // template com todas atividades da pessoa ajudada
                    let atividadeTemplate = "";

                    this.atividades.forEach((atividade) => {
                        const dataDiaFormatada = moment(
                            atividade.dt_dia
                        ).format("ddd");
                        const horaDiaFormatada = moment(
                            atividade.dt_dia
                        ).format("H");
                        atividadeTemplate += `
                          <div class="culto-container mb-1 col-4" id="atividade_pessoa_ajudada_${
                              atividade.id
                          }">
                                <h6 class="culto-title text-center text-muted">${
                                    atividade.tx_nome
                                }</h6>
                                <h6 class="culto-horario text-muted text-center">${dataDiaFormatada.toUpperCase()}${horaDiaFormatada}H</h6>
                                <button type="button" class="btn btn-light btn-light btn-sm btn-block btn-dislike">
                                    <i class="fa fa-thumbs-down text-secondary"></i>
                                </button>
                            </div>
                        `;
                    });

                    // Verifica se é necessário imprimir alguma atividade estática
                    const totalAtividadesEstaticasASeremImprimidas =
                        6 - this.atividades.length;
                    if (totalAtividadesEstaticasASeremImprimidas > 0) {
                        for (
                            let i = 0;
                            i < totalAtividadesEstaticasASeremImprimidas;
                            i++
                        ) {
                            atividadeTemplate += `
                                 <div class="culto-container mb-1 col-4">
                                <h6 class="culto-title text-center text-muted">CULTO</h6>
                                <h6 class="culto-horario text-muted text-center">SÁB22H</h6>
                                <button type="button" class="btn btn-light btn-light btn-sm btn-block btn-dislike">
                                    <i class="fa fa-thumbs-down text-secondary"></i>
                                </button>
                            </div>
                            `;
                        }
                    }

                    // template de cada pessoa ajudada na lista
                    const [pessoaAjudadaTemplate] = $(`
                        <div class="card search_identifier p-1 mt-1 mb-2 div_pessoa_ajudada">
                            <div class="row">
                                <div class="author-contact-info col-12 col-lg-6 ">
                                    <div class="p-2 row bg-grey">
                                        <div class="author-name-container  col-12">
                                            <button class="btn btn-sm btn-dark">
                                                ${iniciaisNome.toUpperCase()}
                                            </button>
                                            <span class="author-name text-muted span_nome_pessoa_ajudada">
                                                ${pessoaAjudada.tx_nome}
                                            </span>
                                         </div>
                                     </div>
                                </div>
                                <div class="card-info row col-12 col-lg-6">
                                    ${atividadeTemplate}
                                </div>
                            </div>
                        </div>
                    `);

                    document
                        .getElementById("lista_de_atividades")
                        .appendChild(pessoaAjudadaTemplate);
                });
            }, 2000);
        }

        // trata os erros que podem acontecer ao requsitar lideres
        handleFalhar(err = {}) {
            console.log(err);
            this.loading(false);
            const errorElement = document.createElement("div");

            // estilização
            errorElement.innerText =
                "Ocorreu um erro ao mostrar as pessoas ajudadas. Atualize a página e tente novamente.";
            errorElement.className = "mx-2 alert alert-danger";

            // add erro na DOM
            const container = document.getElementById("main_card_container");
            container.appendChild(errorElement);
        }

        // imprime o loading de carregando lideres....
        loading(show = true) {
            if (!show) {
                document.getElementById("lista_de_atividades").innerHTML = "";
                return 0;
            }

            const loadingContainer = document.createElement("div");
            loadingContainer.className =
                "d-flex justify-content-center px-2 py-2 align-items-center";

            const loadingIcon = document.createElement("div");
            loadingIcon.className = "donutSpinner";

            loadingContainer.appendChild(loadingIcon);

            document.getElementById("lista_de_atividades").innerHTML = "";
            document
                .getElementById("lista_de_atividades")
                .appendChild(loadingContainer);
        }

        imprimirMensagemNenhumLiderParaMostrar() {
            this.loading(false);
            const mensagemDiv = document.createElement("div");
            mensagemDiv.className = "alert text-center";
            mensagemDiv.style.backgroundColor = "#00aadd";
            mensagemDiv.style.color = "#fff";
            mensagemDiv.innerText = "Nenhuma pessoa para mostrar";

            document
                .getElementById("lista_de_atividades")
                .appendChild(mensagemDiv);
        }

        // Seta período dos lideres mostrados na página HTML
        setPeriodoNaPagina() {
            const dt_begin = moment(this.dataLideres)
                .startOf("week")
                .format("DD/MM");
            const dt_until = moment(this.dataLideres)
                .endOf("week")
                .format("DD/MM");

            document.getElementById(
                "periodo_atividades"
            ).innerText = `Período ${dt_begin} - ${dt_until}`;
        }

        async acaoThumbs() {}

        async avancarSemana() {
            const { _d: dataProximaSemana } = moment(this.dataLideres).add(
                "7",
                "days"
            );
            this.dataLideres = dataProximaSemana;

            try {
                await this.requisitar();
                await this.listar();
            } catch (err) {
                this.handleFalhar(err);
            }
        }

        async voltarSemana() {
            const { _d: dataSemanaAnterior } = moment(
                this.dataLideres
            ).subtract("7", "days");
            this.dataLideres = dataSemanaAnterior;

            try {
                await this.requisitar();
                await this.listar();
            } catch (err) {
                this.handleFalhar(err);
            }
        }
    }

    // executa quando o documento carregar
    window.addEventListener("load", async () => {
        const lideres = new Lideres();

        try {
            await lideres.requisitar();
            await lideres.listar();
        } catch (err) {
            lideres.handleFalhar(err);
        }

        document
            .getElementById("botao_voltar_semana")
            .addEventListener("click", async () => {
                await lideres.voltarSemana();
            });

        document
            .getElementById("botao_avancar_semana")
            .addEventListener("click", async () => {
                await lideres.avancarSemana();
            });

        // document
        //     .getElementsByClassName("botao_avaliar")
        //     .addEventListener("click", async () => {
        //         // verificar se tem class thumbs up ou down e pegar do atributo data o id da pessoa e da atividade
        //         // await lideres.acaoThumbs();
        //     });
    });
</script>
@stop
