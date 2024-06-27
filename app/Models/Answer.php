<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Answer extends Model
{
    public function form(): BelongsTo
    {
        return $this->belongsTo(Form::class);
    }

    public function proyectoClassificationData(): HasOne
    {
        return $this->hasOne(ProyectoClassificationData::class);
    }

    public function classificationOption(): HasOne
    {
        return $this->hasOne(ClassificationOption::class);
    }
}
