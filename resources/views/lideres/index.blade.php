@extends('layouts.app')

@section('content')
    <div class="container">

        <h4 class="text-center">Lista de Líderes</h4>
        <a href="{{ route('lideres.create') }}" class="btn-novo btn btn-success">
            <i class="fa fa-plus"></i>&nbsp;Novo
        </a>
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered dataTable">
                <thead class="thead-light">
                <tr>
                    <th>Ações</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Data de Nascimento</th>
                    <th scope="col">E-mail</th>
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
                            @if( $usuario->id !== auth()->user()->id )
                                <a href="{{ route('lideres.delete', base64_encode($usuario->id)) }}"
                                   class="btn btn-danger link-excluir" title="Excluir">
                                    <span class="fa fa-trash"></span>
                                </a>
                            @endif
                        </td>
                        <td>{{ $usuario->tx_nome }}</td>
                        {{-- @todo Adicionar formatacao com carbon para o campo de data --}}
                        <td>{{ $usuario->dt_nascimento }}</td>
                        <td>{{ $usuario->email }}</td>
                        <td>{{ $usuario->user->tx_nome ?? $usuario->tx_nome }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $aItens->links() }}
        </div>
    </div>
@endsection
