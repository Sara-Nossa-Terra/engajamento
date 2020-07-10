@extends('adminlte::page') @section('title', 'Dashboard')
@section('content_header')
<script src="{{ asset('js/dashboard/index.js')}}"></script>
<link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
@stop @section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card ">
                    <div class="p-2 div_lista_pessoas_ajudadas">
                        <!-- Periodos -->
                        <div class="d-flex justify-content-center mb-2">
                            <div class="btn btn-sm btn-primary">
                                <i class="fa fa-angle-double-left"></i>
                            </div>
                            <div class="periodos mx-1">
                                Período - 28/10/2020
                            </div>

                            <div class="btn btn-sm btn-primary">
                                <i class="fa fa-angle-double-right"></i>
                            </div>
                        </div>

                        <!-- Atividades -->
                        <div class="card p-1 mt-1 bg-info-blue mb-1">
                            <div class="row px-2">
                                <div class="filtro-container col-12 col-lg-6">
                                    <input type="text" class="form-control mt-1 mb-1"
                                           placeholder="Filtro" id="home_search"/>
                                </div>
                                <div class="cultos col-12 col-lg-6">
                                    <div class="row">
                                        <div class="col-4 cultos-info mb-1">
                                            <h6 class="culto-title  m-1  text-center text-white">Culto</h6>
                                            <h6 class="culto-horario m-1   text-white text-center">TER20H</h6>
                                            <button type="button"
                                                    class="btn btn- text-white  btn-sm btn-blue btn-block">
                                                1
                                            </button>
                                        </div>
                                        <div class="col-4 cultos-info mb-1">
                                            <h6 class="culto-title  m-1  text-center text-white">Culto</h6>
                                            <h6 class="culto-horario m-1   text-white text-center">TER20H</h6>
                                            <button type="button"
                                                    class="btn   btn- text-white  btn-sm btn-blue btn-block"
                                            >
                                                1
                                            </button>
                                        </div>

                                        <div class="col-4 cultos-info mb-1">
                                            <h6
                                                class="culto-title  m-1  text-center text-white"
                                            >
                                                Culto
                                            </h6>
                                            <h6
                                                class="culto-horario m-1   text-white text-center"
                                            >
                                                TER20H
                                            </h6>
                                            <button
                                                type="button"
                                                class="btn   btn- text-white  btn-sm btn-blue btn-block"
                                            >
                                                1
                                            </button>
                                        </div>

                                        <div class="col-4 cultos-info mb-1">
                                            <h6
                                                class="culto-title  m-1  text-center text-white"
                                            >
                                                Culto
                                            </h6>
                                            <h6
                                                class="culto-horario m-1   text-white text-center"
                                            >
                                                TER20H
                                            </h6>
                                            <button
                                                type="button"
                                                class="btn   btn- text-white  btn-sm btn-blue btn-block"
                                            >
                                                1
                                            </button>
                                        </div>

                                        <div class="col-4 cultos-info mb-1">
                                            <h6
                                                class="culto-title  m-1  text-center text-white"
                                            >
                                                Culto
                                            </h6>
                                            <h6
                                                class="culto-horario m-1   text-white text-center"
                                            >
                                                TER20H
                                            </h6>
                                            <button
                                                type="button"
                                                class="btn   btn- text-white  btn-sm btn-blue btn-block"
                                            >
                                                1
                                            </button>
                                        </div>

                                        <div class="col-4 cultos-info mb-1">
                                            <h6
                                                class="culto-title  m-1  text-center text-white"
                                            >
                                                Culto
                                            </h6>
                                            <h6
                                                class="culto-horario m-1   text-white text-center"
                                            >
                                                TER20H
                                            </h6>
                                            <button
                                                type="button"
                                                class="btn   btn- text-white  btn-sm btn-blue btn-block"
                                            >
                                                1
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pessoas -->
                        <div class="card search_identifier p-1 mt-1 mb-2 div_pessoa_ajudada">
                             <div class="row">
                                 <div class="author-contact-info col-12 col-lg-6 ">
                                     <div class="p-2 row bg-grey">
                                         <div class="author-name-container  col-7">
                                             <button class="btn btn-sm btn-dark">
                                                 LP
                                             </button>
                                             <span class="author-name text-muted span_nome_pessoa_ajudada"></span>
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

                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
    <script>
        pessoas = new PessoasAjudadas();
        pessoas.url = '{{ route('dashboard.listarpessoas') }}';
//        PessoasAjudadas.lislistarPessoasAjudadas();

    </script>
@stop
