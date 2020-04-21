@extends('layouts.app')

@section('content')
    <div class="container">

        <h4 class="text-center">Lista de Pessoas Ajudadas</h4>
        <a href="{{ route('pessoasajudadas.create') }}" class="btn-novo btn btn-success">
            <i class="fa fa-plus"></i>&nbsp;Novo
        </a>
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered dataTable">
                <thead class="thead-light">
                <tr>
                    <th>Ações</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Data de Nascimento</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Líder</th>
                </tr>
                </thead>
                <tbody>
                @foreach($aItens as $pAjudadas)
                    <tr>
                        <td>
                            <a href="{{ route('pessoasajudadas.edit', base64_encode($pAjudadas->id)) }}"
                               class="btn btn-primary" title="Editar">
                                <span class="fa fa-edit"></span>
                            </a>
                            <a href="{{ route('pessoasajudadas.delete', base64_encode($pAjudadas->id)) }}"
                               class="btn btn-danger link-excluir" title="Excluir">
                                <span class="fa fa-trash"></span>
                            </a>
                        </td>
                        <td>{{ $pAjudadas->tx_nome }}</td>
                        <td>{{ \Carbon\Carbon::parse($pAjudadas->dt_nascimento)->format('d/m/Y') }}</td>
                        <td>{{ $pAjudadas->tx_telefone }}</td>
                        <td>{{ $pAjudadas->lider->tx_nome }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $aItens->links() }}
        </div>
    </div>
@endsection
