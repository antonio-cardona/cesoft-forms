<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pais extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'paises';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Indicates if the model's ID is auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * Get ciudades for pais.
     */
    public function ciudades(): HasMany
    {
        return $this->hasMany(Ciudad::class);
    }
}
