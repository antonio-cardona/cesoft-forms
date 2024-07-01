<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Pregunta extends Model
{
    /**
     * Get the area that owns the pregunta.
     */
    public function area(): BelongsTo
    {
        return $this->belongsTo(Area::class);
    }

    public function forms(): BelongsToMany
    {
        return $this->belongsToMany(Form::class, "form_preguntas");
    }
}
