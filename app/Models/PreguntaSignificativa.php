<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PreguntaSignificativa extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'preguntas_significativas';

    /**
     * Get the area that owns the pregunta.
     */
    public function area(): BelongsTo
    {
        return $this->belongsTo(AreaNivelSuperior::class);
    }
}
