@extends('layouts.app')

@section('content')
    <div class="container">
        {{--<div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        Seja bem vindo ao sistema engajamento
                    </div>
                </div>
            </div>
        </div>--}}
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered dataTable">
                <thead class="thead-light">
                <tr>
                    <th>Ações</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Data de Nascimento</th>
                    <th scope="col">Líder</th>
                </tr>
                </thead>
                <tbody>
                @foreach($aItens as $usuario)
                    <tr>
                        <td>
                            <a href="{{ route('lideres.edit', base64_encode($usuario->id)) }}"
                               class="btn btn-primary" title="Editar">
                                <span class="fa fa-edit"></span>
                            </a>
                            <a href="{{ route('lideres.edit', base64_encode($usuario->id)) }}"
                               class="btn btn-danger link-excluir" title="Excluir">
                                <span class="fa fa-trash"></span>
                            </a>
                        </td>
                        <td>{{ $usuario->tx_nome }}</td>
                        {{-- @todo Adicionar formatacao com carbon para o campo de data --}}
                        <td>{{ $usuario->dt_nascimento }}</td>
                        <td>{{ $usuario->lider_id }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $aItens->links() }}
        </div>
    </div>
@endsection
