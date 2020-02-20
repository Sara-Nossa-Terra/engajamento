<?php

namespace App\Models;

class Atividade extends EngajamentoModel
{
    protected $table = 'tb_atividade';
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tx_nome', 'tx_dia', 'tx_hora', 'deleted_id'
    ];
}
