@csrf
<input type="hidden" name="id" id="id" value="{{ $pessoasAjudadas->id ?? old('id') }}">

<div class="card-body">
    <div class="form-group row">
        <label for="lider_id" class="col-sm-2 col-form-label">Líder
            <span class="obrigatorio"> *</span>
        </label>
        <div class="col-sm-10">
            <select name="lider_id" class="form-control {{ $errors->has('lider_id') ? 'is-invalid' : '' }}"
                    data-show-subtext="true" id="lider_id" data-live-search="true">
                <option value="">Selecione</option>
                @foreach($lideres as $lider)
                    <option
                        @if (isset($pessoasAjudadas->lider_id) && $pessoasAjudadas->lider_id == $lider->id) selected @endif
                        value="{{ $lider->id ?? old('lider_id') }}"
                    >
                        {{ $lider->tx_nome }}
                    </option>
                @endforeach
            </select>
            @if ($errors->has('lider_id'))
                <div class="invalid-feedback">
                    {{ $errors->first('lider_id') }}
                </div>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="tx_nome" class="col-sm-2 col-form-label">Nome
            <span class="obrigatorio"> *</span>
        </label>
        <div class="col-sm-10">
            <input type="text" class="form-control {{ $errors->has('tx_nome') ? 'is-invalid' : '' }}"
                   value="{{ $pessoasAjudadas->tx_nome ?? old('tx_nome') }}" id="tx_nome" placeholder="Nome"
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
                <input class="form-control date_input {{ $errors->has('dt_nascimento') ? 'is-invalid' : '' }}"
                       type="text" name="dt_nascimento" id="dt_nascimento"
                       placeholder="06/06/2020"
                       value="{{ $pessoasAjudadas->dt_nascimento ?? old('dt_nascimento') }}">
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
                <input type="text" class="form-control  phone_input  {{ $errors->has('nu_telefone') ? 'is-invalid' : '' }}"
                       name="nu_telefone" id="nu_telefone"
                       value="{{ $pessoasAjudadas->nu_telefone ?? old('nu_telefone') }}">
                @if ($errors->has('nu_telefone'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nu_telefone') }}
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
    <a href="{{ route('pessoasajudadas.index') }}" class="btn btn-warning">
        <i class="fas fa-arrow-left"></i>
        Voltar
    </a>
</div>
<script>

    const dataPadrao = new Date(2000, 5, 2);
    // datepicker
    flatpickr('#dt_nascimento', {
        dateFormat: 'Y-m-d',
        altFormat: "j F Y",
        defaultDate: "{{ $pessoasAjudadas->dt_nascimento ?? old('dt_nascimento') }}" || dataPadrao,
        locale: 'pt',
        altInput: true,
    });
</script>
