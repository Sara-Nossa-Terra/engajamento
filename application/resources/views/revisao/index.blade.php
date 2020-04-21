@extends('layouts.app')

@section('content')
    <div class="container">

        <h4 class="text-center">Lista de Revisão</h4>
        <a href="{{ route('revisao.create') }}" class="btn-novo btn btn-success">
            <i class="fa fa-plus"></i>&nbsp;Novo
        </a>
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered dataTable">
                <thead class="thead-light">
                <tr>
                    <th>Ações</th>
                    <th scope="col">Data de Cadastro</th>
                    <th scope="col">Data da Revisão</th>
                </tr>
                </thead>
                <tbody>
                @foreach($aItens as $pAjudadas)
                    <tr>
                        <td>
                            <a href="{{ route('revisao.edit', base64_encode($pAjudadas->id)) }}"
                               class="btn btn-primary" title="Editar">
                                <span class="fa fa-edit"></span>
                            </a>
                            <a href="{{ route('revisao.delete', base64_encode($pAjudadas->id)) }}"
                               class="btn btn-danger link-excluir" title="Excluir">
                                <span class="fa fa-trash"></span>
                            </a>
                        </td>
                        <td>{{ \Carbon\Carbon::parse($pAjudadas->dt_cadastro)->format('d/m/Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($pAjudadas->dt_revisao)->format('d/m/Y') }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $aItens->links() }}
        </div>
    </div>
@endsection
