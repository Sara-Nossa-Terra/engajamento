@extends('adminlte::page') @section('title', 'Dashboard')
@section('content_header')
<script src="{{ asset('js/dashboard/index.js') }}"></script>
<link href="{{ asset('css/dashboard.css') }}" rel="stylesheet" />
@stop @section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card" id="main_card_container">
                <div class="p-2 div_lista_pessoas_ajudadas">
                    <!-- Periodos -->
                    <div class="d-flex justify-content-center mb-2">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button id="botao_voltar_semana" type="button" class="btn btn-sm btn-primary">
                                <i class="fa fa-angle-double-left"></i>
                            </button type="button">
                            <button id="periodo_atividades" class="btn periodos mx-1 disable">
                                Carregando...
                            </button>

                            <button id="botao_avancar_semana"  type="button"   class="btn btn-sm btn-primary">
                                <i class="fa fa-angle-double-right"></i>
                            </button type="button">
                        </div>
                    </div>

                    <!-- Filtro e atividades da semana (aquele card azul) -->
                    <div class="card p-1 mt-1 bg-info-blue mb-1">
                        <div class="row px-2">
                            <div class="filtro-container col-12 col-lg-6">
                                <input type="text" class="form-control mt-1 mb-1" placeholder="Filtro" id="home_search" />
                            </div>
                            <div class="cultos col-12 col-lg-6">
                                <div class="row">
                                    <div class="col-4 cultos-info mb-1">
                                        <h6 class="culto-title m-1 text-center text-white">
                                            Culto
                                        </h6>
                                        <h6 class="culto-horario m-1 text-white text-center">
                                            TER20H
                                        </h6>
                                        <button type="button" class="btn btn- text-white btn-sm btn-blue btn-block">
                                            1
                                        </button>
                                    </div>
                                    <div class="col-4 cultos-info mb-1">
                                        <h6 class="culto-title m-1 text-center text-white">
                                            Culto
                                        </h6>
                                        <h6 class="culto-horario m-1 text-white text-center">
                                            TER20H
                                        </h6>
                                        <button type="button" class="btn btn- text-white btn-sm btn-blue btn-block">
                                            1
                                        </button>
                                    </div>
                    
                                    <div class="col-4 cultos-info mb-1">
                                        <h6 class="culto-title m-1 text-center text-white">
                                            Culto
                                        </h6>
                                        <h6 class="culto-horario m-1 text-white text-center">
                                            TER20H
                                        </h6>
                                        <button type="button" class="btn btn- text-white btn-sm btn-blue btn-block">
                                            1
                                        </button>
                                    </div>
                    
                                    <div class="col-4 cultos-info mb-1">
                                        <h6 class="culto-title m-1 text-center text-white">
                                            Culto
                                        </h6>
                                        <h6 class="culto-horario m-1 text-white text-center">
                                            TER20H
                                        </h6>
                                        <button type="button" class="btn btn- text-white btn-sm btn-blue btn-block">
                                            1
                                        </button>
                                    </div>
                    
                                    <div class="col-4 cultos-info mb-1">
                                        <h6 class="culto-title m-1 text-center text-white">
                                            Culto
                                        </h6>
                                        <h6 class="culto-horario m-1 text-white text-center">
                                            TER20H
                                        </h6>
                                        <button type="button" class="btn btn- text-white btn-sm btn-blue btn-block">
                                            1
                                        </button>
                                    </div>
                    
                                    <div class="col-4 cultos-info mb-1">
                                        <h6 class="culto-title m-1 text-center text-white">
                                            Culto
                                        </h6>
                                        <h6 class="culto-horario m-1 text-white text-center">
                                            TER20H
                                        </h6>
                                        <button type="button" class="btn btn- text-white btn-sm btn-blue btn-block">
                                            1
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Atividades -->
                    <div id="lista_de_atividades">
                      
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop @section('js')
<script>
    class Atividades {
        url = "{{ config('url') }}/filtrar-atividades";
        atividades = [];
        dataAtual = new Date();
        dataPrimeiroDiaSemana = new Date();
        dataUltimoDiaSemana = new Date();

        /**
         *
         * Ajuda as datas dos dias atuais da semana
         * de acordo com a data do dispositivo
         * do usuário.
         *
         */
        constructor() {
            this.calcularSegundaEDomingo();
        }

        async requisitar() {
            try {
                const diaDataPrimeiroDiaSemana = this.formatarDiaMesData(
                    this.dataPrimeiroDiaSemana.getDate()
                );
                const mesDataPrimeiroDiaSemana = this.formatarDiaMesData(
                    this.dataPrimeiroDiaSemana.getMonth() + 1
                );
                const anoDataPrimeiroDiaSemana = this.dataPrimeiroDiaSemana.getFullYear();

                const diaDataUltimoDiaSemana = this.formatarDiaMesData(
                    this.dataUltimoDiaSemana.getDate()
                );
                const mesDataUltimoDiaSemana = this.formatarDiaMesData(
                    this.dataUltimoDiaSemana.getMonth() + 1
                );
                const anoDataUltimoDiaSemana = this.dataUltimoDiaSemana.getFullYear();

                // data formatadas de segunda e domingo (primeiro e últimos dias da semana)
                const dt_begin = `${anoDataPrimeiroDiaSemana}-${mesDataPrimeiroDiaSemana}-${diaDataPrimeiroDiaSemana}`;
                const dt_until = `${anoDataUltimoDiaSemana}-${mesDataUltimoDiaSemana}-${diaDataUltimoDiaSemana}`;

                const response = await fetch(
                    `${this.url}?dt_begin=${dt_begin}&dt_until=${dt_until}`
                );
                const jsonAtividades = await response.json();

                this.atividades = jsonAtividades.data;
            } catch (err) {
                await this.handleFalhar(err);
            }
        }

        async listarAtividades() {
            try {
                document.getElementById('lista_de_atividades').innerHTML = '';

                if (!this.atividades.length) {
                    return this.imprimirMensagemNenhumaAtividadeParaListar();
                }

                this.atividades.forEach((atividade) => {
                    let iniciaisNome = "";

                    const nome = atividade.tx_nome || "";

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

                    const [atividadeTemplate] = $(`
                             <div class="card search_identifier p-1 mt-1 mb-2 div_pessoa_ajudada">
                             <div class="row">
                                 <div class="author-contact-info col-12 col-lg-6 ">
                                     <div class="p-2 row bg-grey">
                                         <div class="author-name-container  col-7">
                                             <button class="btn btn-sm btn-dark">
                                                 ${iniciaisNome.toUpperCase()}
                                             </button>
                                             <span class="author-name text-muted span_nome_pessoa_ajudada">
                                                ${atividade.tx_nome}
                                            </span>
                                         </div>
                                         <div class="col-5">
                                             <button class="btn btn-green btn-whatsapp btn-sm">
                                                 <i class="fab fa-whatsapp text-white"></i>
                                             </button>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="card-info row col-12 col-lg-6">
                                     <div class="culto-container mb-1 col-4">
                                         <h6 class="culto-title text-center text-muted">Culto</h6>
                                         <h6 class="culto-horario text-muted text-center">TER20H</h6>
                                         <button
                                             type="button"
                                             class="btn btn-sm btn-primary btn-block"
                                         >
                                             <i class="fa fa-thumbs-up"></i>
                                         </button>
                                     </div>

                                     <div class="culto-container mb-1 col-4">
                                         <h6 class="culto-title text-center text-muted">Culto</h6>
                                         <h6 class="culto-horario text-muted text-center">TER20H</h6>
                                         <button
                                             type="button"
                                             class="btn btn-sm btn-primary btn-block"
                                         >
                                             <i class="fa fa-thumbs-up"></i>
                                         </button>
                                     </div>

                                     <div class="culto-container mb-1 col-4">
                                         <h6 class="culto-title text-center text-muted">Culto</h6>
                                         <h6 class="culto-horario text-muted text-center">TER20H</h6>
                                         <button type="button"
                                                 class="btn btn-light btn-light btn-sm btn-block btn-dislike"
                                         >
                                             <i class="fa fa-thumbs-down text-secondary"></i>
                                         </button>
                                     </div>

                                     <div class="culto-container mb-1 col-4">
                                         <h6 class="culto-title text-center text-muted">Culto</h6>
                                         <h6 class="culto-horario text-muted text-center">TER20H</h6>
                                         <button type="button"
                                                 class="btn btn-light btn-light btn-sm btn-block btn-dislike"
                                         >
                                             <i class="fa fa-thumbs-down text-secondary"></i>
                                         </button>
                                     </div>

                                     <div class="culto-container mb-1 col-4">
                                         <h6 class="culto-title text-center text-muted">Culto</h6>
                                         <h6 class="culto-horario text-muted text-center">TER20H</h6>
                                         <button type="button"
                                                 class="btn btn-light btn-light btn-sm btn-block btn-dislike"
                                         >
                                             <i class="fa fa-thumbs-down text-secondary"></i>
                                         </button>
                                     </div>

                                     <div class="culto-container mb-1 col-4">
                                         <h6 class="culto-title text-center text-muted">Culto</h6>
                                         <h6 class="culto-horario text-muted text-center">TER20H</h6>
                                         <button type="button"
                                                 class="btn btn-light btn-light btn-sm btn-block btn-dislike"
                                         >
                                             <i class="fa fa-thumbs-down text-secondary"></i>
                                         </button>
                                     </div>
                                 </div>
                             </div>
                         </div>
                    `);

                    document
                        .getElementById("lista_de_atividades")
                        .appendChild(atividadeTemplate);
                });
            } catch (err) {
                await this.handleFalhar(err);
            }
        }

        async handleFalhar(err = {}) {
            console.log(err);
            const errorElement = document.createElement("div");

            // estilização
            errorElement.innerText =
                "Ocorreu um erro ao mostrar as pessoas ajudadas. Atualize a página e tente novamente.";
            errorElement.className = "mx-2 alert alert-danger";

            // add erro na DOM
            const container = document.getElementById("main_card_container");
            container.appendChild(errorElement);
        }


        /**
        *
        * Calcula a segunda feira e domingo
        * baseado no dia atual (muda conforme vc aavança ou volta a semanas)
        *
        */
        calcularSegundaEDomingo() {
            // calcula as datas
            this.dataPrimeiroDiaSemana = this.getSegundaFeira(this.dataAtual);
            this.dataUltimoDiaSemana.setDate(
                this.dataPrimeiroDiaSemana.getDate() + 6
            );


            // seta na página as datas selecionadas

            const diaPrimeiroDiaSemana = this.formatarDiaMesData(this.dataPrimeiroDiaSemana.getDate());
            const mesPrimeiroDiaSemana = this.formatarDiaMesData(this.dataPrimeiroDiaSemana.getMonth() + 1);

            const diaUltimoDiaSemana = this.formatarDiaMesData(this.dataUltimoDiaSemana.getDate());
            const mesUltimoDiaSemana = this.formatarDiaMesData(this.dataUltimoDiaSemana.getMonth() + 1);

            document.getElementById('periodo_atividades').innerText = `Período ${diaPrimeiroDiaSemana}/${mesPrimeiroDiaSemana} - ${diaUltimoDiaSemana}/${mesUltimoDiaSemana}`;
        }

        limparAtividades() {
            document.getElementById('lista_de_atividades').innerHTML = '';
        }

        async avancarSemana() {            
            const dataSelecionada = this.dataAtual;
            this.dataAtual.setDate(dataSelecionada.getDate() + 7);
            this.calcularSegundaEDomingo();

            this.imprimirLoading();
            await this.requisitar();
            await this.listarAtividades()
        }

        async voltarSemana() {
            const dataSelecionada = this.dataAtual;
            this.dataAtual.setDate(dataSelecionada.getDate() - 7);
            this.calcularSegundaEDomingo();

            this.imprimirLoading();
            await this.requisitar();
            await this.listarAtividades();
        }

        imprimirMensagemNenhumaAtividadeParaListar() {
            const mensagemDiv = document.createElement('div');
            mensagemDiv.className = 'alert text-center';
            mensagemDiv.style.backgroundColor = '#00aadd';
            mensagemDiv.style.color = '#fff';
            mensagemDiv.innerText = 'Nenhuma atividade para mostrar';
            
            this.limparAtividades();
            document.getElementById('lista_de_atividades').appendChild(mensagemDiv);
        }

        imprimirLoading() {
            const loadingContainer = document.createElement('div');
            loadingContainer.className = 'd-flex justify-content-center px-4 py-4 align-items-center';

            const loadingIcon = document.createElement('div')
            loadingIcon.className = 'bouncingLoader';

            loadingContainer.appendChild(loadingIcon);

            document.getElementById('lista_de_atividades').innerHTML = '';
            document.getElementById('lista_de_atividades').appendChild(loadingContainer);
        }

        /**
         *
         * Função responsável por captura a segunda feira de uma data
         * passada por parametro
         *
         * @params d {Date}
         *
         * */
        getSegundaFeira(d) {
            d = new Date(d);
            var day = d.getDay(),
                diff = d.getDate() - day + (day == 0 ? -6 : 1); // adjust when day is sunday
            return new Date(d.setDate(diff));
        }

       /**
        *
        * Formata o dia e o mês para se encaixar no padrão do 
        * data passada como parametro na hora de fazer a requisição para listar as atividades
        *
        * */
        formatarDiaMesData(numero = 1) {
            return numero < 10 ? `0${numero}` : numero;
        }
    }

    window.addEventListener("load", async () => {
        const atividades = new Atividades();

        try {
            await atividades.imprimirLoading();
            await atividades.requisitar();
            await atividades.listarAtividades();

            // listeners

            document.getElementById('botao_voltar_semana').addEventListener('click', async () => {
                await atividades.voltarSemana();
            })

            document.getElementById('botao_avancar_semana').addEventListener('click', async () => {
               await atividades.avancarSemana();
            })
        } catch (err) {
            atividade.handleFalhar(err);
        }


        
    /**
     * 
     * Filtro de atividades
     *
     */
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

    });
</script>
@stop
