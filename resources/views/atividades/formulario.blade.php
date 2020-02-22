@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ __('Cadastro de Atividades') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('atividades.store') }}">
                            @csrf
                            <input type="hidden" name="id" id="id" value="{{ base64_encode($model->id) }}">

                            <div class="form-group row">
                                <label for="tx_nome" class="col-md-2 col-form-label text-md-right">
                                    {{ __('Nome') }} <span class="required">*</span>
                                </label>

                                <div class="col-md-10">
                                    <input id="tx_nome" type="text" class="form-control @error('tx_nome') is-invalid
                                    @enderror" name="tx_nome" value="{{ $model->tx_nome ?? old('tx_nome') }}" required
                                           autocomplete="tx_nome" autofocus maxlength="200">

                                    @error('tx_nome')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tx_dia" class="col-md-2 col-form-label text-md-right">
                                    {{ __('Dia') }} <span class="required">*</span>
                                </label>

                                <div class="col-md-10">
                                    <input id="tx_dia" type="text" class="form-control @error('tx_dia') is-invalid
                                    @enderror inteiro" name="tx_dia"
                                           value="{{ $model->tx_dia ?? old('tx_dia') }}" required
                                           autocomplete="tx_dia" autofocus maxlength="1">

                                    @error('tx_dia')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tx_hora" class="col-md-2 col-form-label text-md-right">
                                    {{ __('Hora') }} <span class="required">*</span>
                                </label>

                                <div class="col-md-10">
                                    <input id="tx_hora" type="text" class="form-control @error('tx_hora') is-invalid
                                    @enderror inteiro" name="tx_hora"
                                           value="{{ $model->tx_hora ?? old('tx_hora') }}" required
                                           autocomplete="tx_hora" autofocus maxlength="1">

                                    @error('tx_hora')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-success">
                                        <span class="fa fa-send"></span>
                                        {{ __('Salvar') }}
                                    </button>
                                    <a href="{{ route('atividades.index') }}" class="btn btn-danger">
                                        <span class="fa fa-reply"></span>
                                        {{ __('Voltar') }}
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
