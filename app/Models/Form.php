<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Form extends Model
{
    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function proyecto() : BelongsTo
    {
        return $this->belongsTo(Proyecto::class);
    }

    public function areas() : BelongsToMany
    {
        return $this->belongsToMany(Area::class, "form_areas");
    }

    public function formAreas() : HasMany
    {
        return $this->hasMany(FormArea::class);
    }

    public function preguntas() : BelongsToMany
    {
        return $this->belongsToMany(Pregunta::class, "form_preguntas");
    }

    public function formPreguntas() : HasMany
    {
        return $this->hasMany(FormPregunta::class);
    }

    public function formProyectoClassificationData() : HasMany
    {
        return $this->hasMany(FormProyectoClassificationData::class);
    }
}
