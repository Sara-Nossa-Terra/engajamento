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
        'tx_nome', 'dt_nascimento', 'nu_telefone', 'lider_id', 'deleted_id'
    ];

    /**
     * Relacionamento de Líder com Pessoas Ajudadas.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function lider()
    {
        return $this->belongsTo(\App\Models\User::class, 'lider_id', 'id');
    }
}
