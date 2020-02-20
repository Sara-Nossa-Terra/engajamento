<?php

namespace App\Models;

class Revisao extends EngajamentoModel
{
    protected $table = 'tb_revisao';
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'dt_revisao', 'dt_cadastro', 'deleted_id'
    ];
}
