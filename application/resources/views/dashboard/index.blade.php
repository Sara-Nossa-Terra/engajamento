@extends('adminlte::page') @section('title', 'Dashboard')
@section('content_header')

    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet"/>
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
                                    <div class="row" id="menu_atividades"></div>
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
            pessoasAjudadas = [];
            totalizador = [];
            menuAtividades = [];
            dataDasAtividades = new Date();

            constructor() {
                this.dataDasAtividades = new Date();
                moment.locale("pt-br");
            }

            // requisita as pessoas ajudadas
            async requisitar() {
                // imprime loading
                this.loading(true);
                this.setPeriodoNaPagina();

                const dataComecoSemana = moment(this.dataDasAtividades).startOf(
                    "week"
                );
                const dataFimSemana = moment(this.dataDasAtividades).endOf("week");

                let dt_begin = moment(dataComecoSemana).format("YYYY-MM-DD");
                let dt_until = moment(dataFimSemana).format("YYYY-MM-DD");

                const response = await fetch(
                    `${this.url}?dt_begin=${dt_begin}&dt_until=${dt_until}`
                );
                const json = await response.json();

                this.pessoasAjudadas = Object.values(json.pessoasAjudadas);
                this.totalizador = json.totalizador;
                this.menuAtividades = json.atividades[0];
            }

            // lista das pessoas ajudadas
            listarPessoasAjudadas() {
                setTimeout(() => {
                    // seta periodo das atividades na página HTML (aqueles entre os meios dos botões avançar e voltar semana)
                    const dataComecoSemana = moment(this.dataDasAtividades).startOf(
                        "week"
                    );
                    const dataFimSemana = moment(this.dataDasAtividades).endOf(
                        "week"
                    );

                    let dt_begin = moment(dataComecoSemana).format("YYYY-MM-DD");
                    let dt_until = moment(dataFimSemana).format("YYYY-MM-DD");

                    document.getElementById("lista_de_atividades").innerHTML = "";

                    if (!this.pessoasAjudadas.length) {
                        this.imprimirMesangemNenhumaAtividadeMostrar();
                    }

                    const atividadesCounter = 0;
                    this.pessoasAjudadas.forEach((pessoaAjudada) => {
                        // template com todas atividades da pessoa ajudada
                        let atividadeTemplate = "";
                        let atividadesCounter = 0;

                        pessoaAjudada.atividade.forEach((atividade) => {
                            // conta as atividades para, se o número de atividades for maior que 6, ele ignora a sétima atividade em diante
                            if (atividadesCounter >= 6) return;
                            atividadesCounter++;

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

                                ${
                                atividade.thumbsup
                                    ? `
                                        <button
                                            id="botao_atividade_${pessoaAjudada.id}_${atividade.id}"
                                            onClick="acaoThumbsUp(${atividade.id}, ${pessoaAjudada.id}, ${atividade.thumbsup})"
                                            type="button" class="btn btn-thumbsup btn-sm btn-block">
                                            <i class="fa fa-thumbs-up text-white"></i>
                                        </button>
                                    `
                                    : `
                                        <button
                                            id="botao_atividade_${pessoaAjudada.id}_${atividade.id}"
                                            onClick="acaoThumbsUp(${atividade.id}, ${pessoaAjudada.id}, ${atividade.thumbsup})"
                                            type="button" class="btn btn-light btn-sm btn-block btn-dislike">
                                            <i class="fa fa-thumbs-down text-secondary"></i>
                                        </button>
                                    `
                            }
                            </div>
                        `;
                        });

                        // // Verifica se é necessário imprimir alguma atividade estática
                        // const totalAtividadesEstaticasASeremImprimidas =
                        //     6 - pessoaAjudada.atividade.length;
                        // if (totalAtividadesEstaticasASeremImprimidas > 0) {
                        //     for (
                        //         let i = 0;
                        //         i < totalAtividadesEstaticasASeremImprimidas;
                        //         i++
                        //     ) {
                        //         atividadeTemplate += `
                        //         <div class="culto-container mb-1 col-4">
                        //             <h6 class="culto-title text-center text-muted">ESTÁTICA</h6>
                        //             <h6 class="culto-horario text-muted text-center">SÁB22H</h6>
                        //             <button type="button" class="btn btn-light btn-light btn-sm btn-block btn-dislike">
                        //                 <i class="fa fa-thumbs-down text-secondary"></i>
                        //             </button>
                        //         </div>
                        //         `;
                        //     }
                        // }

                        // template de cada pessoa ajudada na lista
                        const [pessoaAjudadaTemplate] = $(`
                        <div class="card search_identifier p-1 mt-1 mb-2 div_pessoa_ajudada">
                            <div class="row">
                                <div class="author-contact-info col-12 col-lg-6 ">
                                    <div class="p-2 row bg-grey">
                                        <div class="author-name-container  col-12">
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

            // lista do menu azul de atividades
            listarMenuAtividades() {
                let menuTemplate = "";

                let countAtividades = 0;
                this.menuAtividades.forEach((atividade) => {
                    // imprimir somtente até 6 atividades
                    if (countAtividades >= 6) return;
                    countAtividades++;

                    const totalAtividadesConcluidas = this.countAtividades(
                        atividade
                    );

                    const dataDiaFormatada = moment(atividade.dt_dia).format("ddd");
                    const horaDiaFormatada = moment(atividade.dt_dia).format("H");

                    menuTemplate += `
                    <div class="col-4 cultos-info mb-1">
                        <h6
                            class="culto-title m-1 text-center text-white"
                        >
                            ${atividade.tx_nome}
                        </h6>
                        <h6 class="culto-horario m-1 text-white text-center">
                            ${dataDiaFormatada.toUpperCase()}${horaDiaFormatada}H
                        </h6>
                        <button
                            type="button"
                            class="btn btn- text-white btn-sm btn-blue btn-block"
                        >
                            ${totalAtividadesConcluidas}
                        </button>
                    </div>
                `;
                });

                document.getElementById("menu_atividades").innerHTML = menuTemplate;
            }

            countAtividades(atividade) {
                let counter = 0;

                this.pessoasAjudadas.forEach((pessoaAjudada) => {
                    pessoaAjudada.atividade.forEach((atividadePessoaAjudada) => {
                        if (atividadePessoaAjudada.id != atividade.id) return;
                        if (!atividadePessoaAjudada.thumbsup) return;
                        counter++;
                    });
                });

                return counter;
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
                document.getElementById("menu_atividades").innerHTML = "";

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

            imprimirMesangemNenhumaAtividadeMostrar() {
                this.loading(false);
                const mensagemDiv = document.createElement("div");
                mensagemDiv.className = "alert text-center";
                mensagemDiv.style.backgroundColor = "#00aadd";
                mensagemDiv.style.color = "#fff";
                mensagemDiv.innerText = "Nenhuma pessoa ajudada para mostrar";

                document
                    .getElementById("lista_de_atividades")
                    .appendChild(mensagemDiv);
            }

            // Seta período dos lideres mostrados na página HTML
            setPeriodoNaPagina() {
                const dt_begin = moment(this.dataDasAtividades)
                    .startOf("week")
                    .format("DD/MM");
                const dt_until = moment(this.dataDasAtividades)
                    .endOf("week")
                    .format("DD/MM");

                document.getElementById(
                    "periodo_atividades"
                ).innerText = `Período ${dt_begin} - ${dt_until}`;
            }

            // Função responsável por mudar o valor do thumbsup dentro da lista de atividades (pessoasAjudadadas -> pessoaAjudada -> atividade -> thumbsup)
            atualizarListaThumbsUp(pessoaAjudadaId, atividadeId, newThumbsUpValue) {
                this.pessoasAjudadas.map((pessoaAjudada) => {
                    if (pessoaAjudada.id != pessoaAjudadaId) return;
                    pessoaAjudada.atividade.map((atividade) => {
                        if (atividade.id != atividadeId) return;
                        atividade.thumbsup = newThumbsUpValue;
                    });
                    return pessoaAjudada;
                });

                this.listarPessoasAjudadas();
                this.listarMenuAtividades();
            }

            async avancarSemana() {
                const {_d: dataProximaSemana} = moment(
                    this.dataDasAtividades
                ).add("7", "days");
                this.dataDasAtividades = dataProximaSemana;

                try {
                    await this.requisitar();
                    await this.listarMenuAtividades();
                    await this.listarPessoasAjudadas();
                } catch (err) {
                    this.handleFalhar(err);
                }
            }

            async voltarSemana() {
                const {_d: dataSemanaAnterior} = moment(
                    this.dataDasAtividades
                ).subtract("7", "days");
                this.dataDasAtividades = dataSemanaAnterior;

                try {
                    await this.requisitar();
                    await this.listarMenuAtividades();
                    await this.listarPessoasAjudadas();
                } catch (err) {
                    this.handleFalhar(err);
                }
            }
        }

        const lideres = new Lideres();
        const thumbsDownURL = "{{ route('atividadepessoa.destroy', ':id') }}";
        const thumbsUpURL = "{{ route('atividadepessoa.store') }}";

        async function acaoThumbsUp(atividadeId, pessoaAjudadaId, thumbsup = null) {
            let url = thumbsUpURL;
            let method = "POST";
            const formData = new FormData();

            if (thumbsup != null) {
                url = thumbsDownURL;
                url = url.slice(0, url.length - 3) + thumbsup;
                method = "DELETE";
            } else {
                method = "POST";
                formData.append('atividade_id', atividadeId);
                formData.append('pessoa_id', pessoaAjudadaId);
                formData.append('dt_periodo', lideres.dataDasAtividades.toISOString());
            }

            try {
                const responseAtividadePessoa = await fetch(url, {
                    method,
                    body: formData,
                    headers: {
                        'X-CSRF-Token': "{{ csrf_token() }}"
                    }
                }).then(result => result.json());

                // atualiza a lista de atividades da pessoa ajudada
                lideres.pessoasAjudadas.map(pessoa => {
                    if (pessoa.id == pessoaAjudadaId) {
                        pessoa.atividade.map(atividade => {
                            if (atividade.id != atividadeId) return;
                            atividade.thumbsup =  thumbsup == null? responseAtividadePessoa.id: null
                        })
                    }
                })

                lideres.listarPessoasAjudadas();
                lideres.listarMenuAtividades();
            } catch (err) {
                console.log("Erro na requisição do thumbs up: ", err);
            }
        }

        async function carregarPessoasAjudadas() {
            try {
                await lideres.requisitar();
                await lideres.listarMenuAtividades();
                await lideres.listarPessoasAjudadas();
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
        }

        function filtroPessoasAjudadas() {
            const input = document.getElementById("home_search");

            if (input) {
                // atualiza o estado da dom toda vez que o input é editado
                input.onkeyup = (event) => {
                    const valorInput = $(input).val();
                    const textsEl = document.querySelectorAll(".author-name");

                    // mostrar todos os items com a classe .search_identifier
                    $(".search_identifier").show();

                    textsEl.forEach((el) => {
                        if (
                            // oculta item se ele não der match com o texto procurado
                            el.innerHTML
                                .toLowerCase()
                                .indexOf(valorInput.toLowerCase()) < 0
                        ) {
                            $(el).parent().parent().parent().parent().parent().hide();
                        }
                    });
                };
            }
        }

        // executado quando a página for totalmente carregada
        window.addEventListener("load", carregarPessoasAjudadas);
        window.addEventListener("load", filtroPessoasAjudadas)

    </script>
@stop
