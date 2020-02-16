@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ __('Cadastro de Líder') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('lideres.store') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="lider_id" class="col-md-2 col-form-label text-md-right">
                                    {{ __('Líder') }}
                                </label>

                                <div class="col-md-10">
                                    <select name="lider_id" class="form-control" data-show-subtext="true"
                                            id="lider_id" data-live-search="true">
                                        <option selected disabled>Selecione</option>
                                        @foreach($lideres as $supervisor)
                                            <option value="{{$supervisor->id}}" {{ ($model->lider_id == $supervisor->id) ? 'selected' : '' }}>
                                                {{ $supervisor->tx_nome }}
                                            </option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
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
                                <label for="dt_nascimento" class="col-md-2 col-form-label text-md-right">
                                    {{ __('Data de Nascimento') }} <span class="required">*</span>
                                </label>

                                <div class="col-md-10">
                                    <input id="dt_nascimento" type="date" class="form-control @error('dt_nascimento') is-invalid
                                    @enderror" name="dt_nascimento" value="{{ $model->dt_nascimento ?? old('dt_nascimento') }}" required
                                           autocomplete="dt_nascimento" autofocus>

                                    @error('dt_nascimento')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tx_telefone" class="col-md-2 col-form-label text-md-right">
                                    {{ __('Telefone') }} <span class="required">*</span>
                                </label>

                                <div class="col-md-10">
                                    <input id="tx_telefone" type="text" class="form-control @error('tx_telefone') is-invalid
                                    @enderror" name="tx_telefone" value="{{ $model->tx_telefone ?? old('tx_telefone') }}" required
                                           autocomplete="tx_telefone" autofocus>

                                    @error('tx_telefone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-2 col-form-label text-md-right">
                                    {{ __('E-Mail') }} <span class="required">*</span>
                                </label>

                                <div class="col-md-10">
                                    <input id="email" type="email" class="form-control
                                    @error('email') is-invalid @enderror" name="email"
                                           value="{{ $model->email ?? old('email') }}"
                                           required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-2 col-form-label text-md-right">
                                    {{ __('Senha') }}
                                </label>

                                <div class="col-md-10">
                                    <input id="password" type="password" class="form-control
                                    @error('password') is-invalid @enderror" name="password"
                                           required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-2 col-form-label text-md-right">
                                    {{ __('Confirmação de Senha') }}
                                </label>

                                <div class="col-md-10">
                                    <input id="password-confirm" type="password" class="form-control"
                                           name="password_confirmation" autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-success">
                                        <span class="fa fa-send"></span>
                                        {{ __('Salvar') }}
                                    </button>
                                    <a href="{{ route('lideres.index') }}" class="btn btn-danger">
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
