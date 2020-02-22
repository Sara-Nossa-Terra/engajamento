<?php

namespace App\Models;

class PessoasAjudadas extends EngajamentoModel
{
    protected $table = 'tb_pessoas';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tx_nome', 'dt_nascimento', 'tx_telefone', 'lider_id', 'deleted_id'
    ];
}
