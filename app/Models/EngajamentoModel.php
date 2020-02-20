<?php

namespace App\Models;

use App\Classes\Util;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EngajamentoModel extends Model
{
    Use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $floats = [];

    /**
     * Overwrite the method for treat attributes before save on database.
     *
     * @param array $attributes
     * @return Model|void
     */
    public function fill(array $attributes)
    {
        foreach ($attributes as $key => $value) {
            # Format dates values for database
            if ($value && in_array($key, $this->dates)) {
                $attributes[$key] = Util::formatarData($value);
                # Format floats values for database
            } elseif ($value && in_array($key, $this->floats)) {
                $attributes[$key] = str_replace(['.', ','], ['', '.'], $value);
            }
        }

        parent::fill($attributes);
    }
}
