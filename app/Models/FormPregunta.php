<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class FormPregunta extends Model
{
    public function form() : BelongsTo
    {
        return $this->belongsTo(Form::class);
    }

    public function pregunta() : HasOne
    {
        return $this->hasOne(Pregunta::class);
    }
}
