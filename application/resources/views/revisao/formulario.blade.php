@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ __('Cadastro de Revisão') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('revisao.store') }}">
                            @csrf
                            <input type="hidden" name="id" id="id" value="{{ base64_encode($model->id) }}">

                            <div class="form-group row">
                                <label for="dt_revisao" class="col-md-2 col-form-label text-md-right">
                                    {{ __('Data da Revisão') }} <span class="required">*</span>
                                </label>

                                <div class="col-md-10">
                                    <input id="dt_revisao" type="date" class="form-control @error('dt_revisao') is-invalid
                                    @enderror inteiro" name="dt_revisao"
                                           value="{{ $model->dt_revisao ?? old('dt_revisao') }}" required
                                           autocomplete="dt_revisao" autofocus maxlength="1">

                                    @error('dt_revisao')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="dt_cadastro" class="col-md-2 col-form-label text-md-right">
                                    {{ __('Data Cadastro') }} <span class="required">*</span>
                                </label>

                                <div class="col-md-10">
                                    <input id="dt_cadastro" type="date" class="form-control @error('dt_cadastro') is-invalid
                                    @enderror inteiro" name="dt_cadastro"
                                           value="{{ $model->dt_cadastro ?? old('dt_cadastro') }}" required
                                           autocomplete="dt_cadastro" autofocus maxlength="1">

                                    @error('dt_cadastro')
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
                                    <a href="{{ route('revisao.index') }}" class="btn btn-danger">
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
