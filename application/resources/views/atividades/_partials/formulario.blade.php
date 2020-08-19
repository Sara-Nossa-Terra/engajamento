@csrf
<input type="hidden" name="id" id="id" value="{{ $atividades->id ?? old('id') }}">

<div class="card-body">
    <div class="form-group row">
        <label for="tx_nome" class="col-sm-2 col-form-label">Nome
            <span class="obrigatorio"> *</span>
        </label>
        <div class="col-sm-10">
            <input type="text" class="form-control {{ $errors->has('tx_nome') ? 'is-invalid' : '' }}"
                   value="{{ $atividades->tx_nome ?? old('tx_nome') }}" id="tx_nome" placeholder="Nome"
                   name="tx_nome">
            @if ($errors->has('tx_nome'))
                <div class="invalid-feedback">
                    {{ $errors->first('tx_nome') }}
                </div>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="tx_dia" class="col-sm-2 col-form-label">Dia
            <span class="obrigatorio"> *</span>
        </label>
        <div class="col-sm-10">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                </div>
                {{-- Implementar callendar.--}}
                <input class="form-control date_input {{ $errors->has('tx_dia') ? 'is-invalid' : '' }}"
                        placeholder="06/06/2020"
                       type="text" name="tx_dia" id="tx_dia"
                       value="{{ $atividades->tx_dia ?? old('tx_dia') }}">
                @if ($errors->has('tx_dia'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tx_dia') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label for="tx_hora" class="col-sm-2 col-form-label">Hora
            <span class="obrigatorio"> *</span>
        </label>
        <div class="col-sm-10">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-clock"></i></span>
                </div>
                {{-- Implementar máscara de telefone.--}}
                <input type="text" class="form-control time_input  {{ $errors->has('tx_hora') ? 'is-invalid' : '' }}"
                        placeholder="14:00"
                       name="tx_hora" id="tx_hora"
                       value="{{ $atividades->tx_hora ?? old('tx_hora') }}">
                <div id="picker"></div>

            @if ($errors->has('tx_hora'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tx_hora') }}
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
    <a href="{{ route('atividades.index') }}" class="btn btn-warning">
        <i class="fas fa-arrow-left"></i>
        Voltar
    </a>
</div>

<script>
    window.addEventListener('load', function() {
        const dataAgora = new Date();
        dataAgora.setHours(18);
        dataAgora.setMinutes(0);

        // datepicker
        flatpickr('#tx_dia', {
            dateFormat: 'Y-m-d',
            altFormat: "j F Y",
            defaultDate: new Date(),
            locale: 'pt',
            altInput: true,
        });

        // timepicker
        flatpickr('#tx_hora', {
            locale: 'pt',
            enableTime: true,
            time_24hr: true,
            noCalendar: true,
            defaultDate: dataAgora,
            dateFormat: 'H:i',
            altFormat: "H:i",
            altInput: true,
        });

    })
</script>
