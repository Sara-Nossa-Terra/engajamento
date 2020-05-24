@extends('adminlte::page')

@section('title', 'Líderes')

@section('content_header')
    <h1>Lista de Líderes</h1>
@stop

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Líderes</h3>
                    <div class="card-tools">
                        <a href="{{ route('lideres.create') }}" class="btn-novo btn btn-success float-right">
                            <i class="fa fa-plus"></i>&nbsp;Novo
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover table-bordered ">
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
                        @foreach($aItens as $lider)
                            <tr>
                                <td>
                                    <a href="{{ route('lideres.edit', base64_encode($lider->id)) }}"
                                       class="btn btn-primary" title="Editar">
                                        <span class="fa fa-edit"></span>
                                    </a>
                                    @if( $lider->id !== auth()->user()->id )
                                        <a href="{{ route('lideres.delete', base64_encode($lider->id)) }}"
                                           class="btn btn-danger link-excluir" title="Excluir">
                                            <span class="fa fa-trash"></span>
                                        </a>
                                    @endif
                                </td>
                                <td>{{ $lider->tx_nome }}</td>
                                <td>{{ \Carbon\Carbon::parse($lider->dt_nascimento)->format('d/m/Y') }}</td>
                                <td>{{ $lider->email }}</td>
                                <td>{{ $lider->user->tx_nome ?? $lider->tx_nome }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer clearfix">
                    <ul class="pagination pagination-sm m-0 float-right">
                        {{ $aItens->links() }}
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
