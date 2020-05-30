@csrf
<input type="hidden" name="id" id="id" value="{{ $lideres->id ?? old('id') }}">

<div class="card-body">
    <div class="form-group row">
        <label for="tx_nome" class="col-sm-2 col-form-label">Nome
            <span class="obrigatorio"> *</span>
        </label>
        <div class="col-sm-10">
            <input type="text" class="form-control {{ $errors->has('tx_nome') ? 'is-invalid' : '' }}"
                   value="{{ $lideres->tx_nome ?? old('tx_nome') }}" id="tx_nome" placeholder="Nome"
                   name="tx_nome">
            @if ($errors->has('tx_nome'))
                <div class="invalid-feedback">
                    {{ $errors->first('tx_nome') }}
                </div>
            @endif
        </div>
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
                <input class="form-control {{ $errors->has('dt_nascimento') ? 'is-invalid' : '' }}"
                       type="date" name="dt_nascimento" id="dt_nascimento"
                       value="{{ $lideres->dt_nascimento ?? old('dt_nascimento') }}">
                @if ($errors->has('dt_nascimento'))
                    <div class="invalid-feedback">
                        {{ $errors->first('dt_nascimento') }}
                    </div>
                @endif
            </div>
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
                <input type="tel" class="form-control {{ $errors->has('nu_telefone') ? 'is-invalid' : '' }}"
                       name="nu_telefone" id="nu_telefone"
                       value="{{ $lideres->nu_telefone ?? old('nu_telefone') }}">
                @if ($errors->has('nu_telefone'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nu_telefone') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label for="email" class="col-sm-2 col-form-label">Email
            <span class="obrigatorio"> *</span>
        </label>
        <div class="col-sm-10">
            <div class="input-group">
                <div class="input-group-prepend">
{{--                    <span class="input-group-text"><i class="far fa-mail-reply"></i></span>--}}
                </div>
                <input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                       name="email" id="email"
                       value="{{ $lideres->email ?? old('email') }}">
                @if ($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label for="password" class="col-sm-2 col-form-label">Senha
            <span class="obrigatorio"> *</span>
        </label>
        <div class="col-sm-10">
            <div class="input-group">
                <div class="input-group-prepend">
{{--                    <span class="input-group-text"><i class="fas fa-phone"></i></span>--}}
                </div>
                <input type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                       name="password" id="password"
                       value="{{ $lideres->password ?? old('password') }}">
                @if ($errors->has('password'))
                    <div class="invalid-feedback">
                        {{ $errors->first('password') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label for="password_confirmation" class="col-sm-2 col-form-label">Confirmação de Senha
            <span class="obrigatorio"> *</span>
        </label>
        <div class="col-sm-10">
            <div class="input-group">
                <div class="input-group-prepend">
{{--                    <span class="input-group-text"><i class="fas fa-phone"></i></span>--}}
                </div>
                <input type="password" class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}"
                       name="password_confirmation" id="password_confirmation"
                       value="{{ $lideres->password_confirmation ?? old('password_confirmation') }}">
                @if ($errors->has('password_confirmation'))
                    <div class="invalid-feedback">
                        {{ $errors->first('password_confirmation') }}
                    </div>
                @endif
            </div>
        </div>
    </div>

</div>
<div class="card-footer">
    <button type="submit" class="btn btn-info">
        <i class="fas fa-paper-plane"></i>
        Salvar
    </button>
    <a href="{{ route('lideres.index') }}" class="btn btn-warning">
        <i class="fas fa-arrow-left"></i>
        Voltar
    </a>
</div>
