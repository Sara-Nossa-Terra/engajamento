<?php

namespace App\Models;

use Illuminate\Database\Eloquent\{Model, SoftDeletes};

class Atividades extends Model
{
    Use SoftDeletes;
    protected $table = 'tb_atividades';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tx_nome', 'dt_dia', 'deleted_id'
    ];
}
