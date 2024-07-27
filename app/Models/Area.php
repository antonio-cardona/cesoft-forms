<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Area extends Model
{
    /**
     * Get the Proyecto that owns the Area.
     */
    public function proyecto(): BelongsTo
    {
        return $this->belongsTo(Proyecto::class);
    }

    /**
     * Get the Pregunta for the Proyecto.
     */
    public function preguntas(): HasMany
    {
        return $this->hasMany(Pregunta::class)->orderBy("orden");
    }

    public function forms(): BelongsToMany
    {
        return $this->belongsToMany(Form::class, "form_areas");
    }

    public function deletePreguntas() {
        Pregunta::where("area_id", $this->id)->delete();
    }
}
