<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AreaNivelSuperior extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'areas_nivel_superiores';


    /**
     * Get the PreguntaSignificativa for the Proyecto.
     */
    public function preguntas(): HasMany
    {
        return $this->hasMany(PreguntaSignificativa::class)->orderBy("orden");
    }

    /**
     * Get the proyecto that owns the area.
     */
    public function proyecto(): BelongsTo
    {
        return $this->belongsTo(Proyecto::class);
    }
}
