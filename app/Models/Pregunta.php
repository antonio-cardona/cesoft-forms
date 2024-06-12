<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pregunta extends Model
{
    /**
     * Get the area that owns the pregunta.
     */
    public function area(): BelongsTo
    {
        return $this->belongsTo(Area::class);
    }
}
