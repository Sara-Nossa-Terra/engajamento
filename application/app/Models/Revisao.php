<?php

namespace App\Models;

use Illuminate\Database\Eloquent\{Model, SoftDeletes};

class Revisao extends Model
{
    Use SoftDeletes;
    protected $table = 'tb_revisoes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'dt_revisao', 'dt_cadastro', 'deleted_id'
    ];
}
