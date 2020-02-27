<?php

namespace App\Models;

use App\Classes\Util;
use Illuminate\Database\Eloquent\{Model, SoftDeletes};

class EngajamentoModel extends Model
{
    Use SoftDeletes;

    /**
     * Array with attributes with date
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * Array with floats values.
     * @var array
     */
    protected $floats = [];

    /**
     * Set the all instances models with primaryKey 'id'.
     * @var string
     */
    protected $primaryKey = 'id';

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
