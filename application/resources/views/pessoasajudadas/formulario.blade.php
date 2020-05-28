@extends('adminlte::page')

@section('title', 'Pessoas Ajudadas')

@section('content')

    <div class="card card-gray">
        <div class="card-header">
            <h3 class="card-title">Formulário de Pessoas Ajudadas</h3>
        </div>
        <form method="POST" action="{{ route('pessoasajudadas.store') }}" class="form-horizontal">
            @csrf
            <input type="hidden" name="id" id="id" value="{{ base64_encode($model->id) }}">

            <div class="card-body">
                <div class="form-group row">
                    <label for="lider_id" class="col-sm-2 col-form-label">Líder</label>
                    <div class="col-sm-10">
                        <select name="lider_id" class="form-control" data-show-subtext="true"
                                id="lider_id" data-live-search="true">
                            <option selected disabled>Selecione</option>
                            @foreach($lideres as $lider)
                                <option
                                    value="{{ $lider->id }}" {{ ( $model->lider_id == $lider->id ) ? 'selected' : '' }}>
                                    {{ $lider->tx_nome }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tx_nome" class="col-sm-2 col-form-label">Nome
                        <span class="obrigatorio"> *</span>
                    </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control {{ $errors->has('tx_nome') ? 'is-invalid' : '' }}"
                               value="{{ old('tx_nome') }}" id="tx_nome" placeholder="Nome" name="tx_nome" required>
                    </div>
                    @if ($errors->has('tx_nome'))
                        <div class="invalid-feedback">
                            {{ $errors->first('tx_nome') }}
                        </div>
                    @endif
                </div>
                <div class="form-group row">
                    <label for="dt_nascimento" class="col-sm-2 col-form-label">Data de Nascimento
                        <span class="obrigatorio"> *</span>
                    </label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                            </div>
                            {{-- Implementar callendar.--}}
                            <input type="date" name="dt_nascimento" id="dt_nascimento"
                                   class="form-control{{ $errors->has('dt_nascimento') ? 'is-invalid' : '' }}" required>
                        </div>
                        @if ($errors->has('dt_nascimento'))
                            <div class="invalid-feedback">
                                {{ $errors->first('dt_nascimento') }}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nu_telefone" class="col-sm-2 col-form-label">Telefone
                        <span class="obrigatorio"> *</span>
                    </label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-phone"></i></span>
                            </div>
                            {{-- Implementar máscara de telefone.--}}
                            <input type="tel" class="form-control{{ $errors->has('nu_telefone') ? 'is-invalid' : '' }}"
                                   name="nu_telefone" id="nu_telefone">
                        </div>
                        @if ($errors->has('nu_telefone'))
                            <div class="invalid-feedback">
                                {{ $errors->first('nu_telefone') }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-info">
                    <i class="fas fa-paper-plane"></i>
                    Salvar
                </button>
                <a href="{{ route('pessoasajudadas.index') }}" class="btn btn-warning">
                    <i class="fas fa-arrow-left"></i>
                    Voltar
                </a>
            </div>
        </form>
    </div>
@endsection
