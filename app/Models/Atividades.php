<?php

namespace App\Models;

class Atividades extends EngajamentoModel
{
    protected $table = 'tb_atividades';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tx_nome', 'tx_dia', 'tx_hora', 'deleted_id'
    ];
}
