<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ProyectoClassificationData extends Model
{
    public function proyecto(): BelongsTo
    {
        return $this->belongsTo(Proyecto::class);
    }

    public function classificationData(): BelongsTo
    {
        return $this->belongsTo(ClassificationData::class);
    }

    public function forms(): BelongsToMany
    {
        return $this->belongsToMany(Form::class, "form_proyecto_classification_data");
    }
}
