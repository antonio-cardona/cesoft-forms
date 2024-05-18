<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ciudad extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'ciudades';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Get the user that owns the phone.
     */
    public function pais(): BelongsTo
    {
        return $this->belongsTo(Pais::class);
    }
}
