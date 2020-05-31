@csrf
<input type="hidden" name="id" id="id" value="{{ $revisao->id ?? old('id') }}">

<div class="card-body">
    <div class="form-group row">
        <label for="dt_revisao" class="col-sm-2 col-form-label">Data da Revisão
            <span class="obrigatorio"> *</span>
        </label>
        <div class="col-sm-10">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                </div>
                {{-- Implementar callendar.--}}
                <input class="form-control {{ $errors->has('dt_revisao') ? 'is-invalid' : '' }}"
                       type="date" name="dt_revisao" id="dt_revisao"
                       value="{{ $revisao->dt_revisao ?? old('dt_revisao') }}">
                @if ($errors->has('dt_revisao'))
                    <div class="invalid-feedback">
                        {{ $errors->first('dt_revisao') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label for="dt_cadastro" class="col-sm-2 col-form-label">Data do Cadastro
            <span class="obrigatorio"> *</span>
        </label>
        <div class="col-sm-10">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                </div>
                {{-- Implementar callendar.--}}
                <input class="form-control {{ $errors->has('dt_cadastro') ? 'is-invalid' : '' }}"
                       type="date" name="dt_cadastro" id="dt_cadastro"
                       value="{{ $revisao->dt_cadastro ?? old('dt_cadastro') }}">
                @if ($errors->has('dt_cadastro'))
                    <div class="invalid-feedback">
                        {{ $errors->first('dt_cadastro') }}
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
    <a href="{{ route('revisao.index') }}" class="btn btn-warning">
        <i class="fas fa-arrow-left"></i>
        Voltar
    </a>
</div>
