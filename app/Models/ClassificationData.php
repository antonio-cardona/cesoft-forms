<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ClassificationData extends Model
{
    public function options(): HasMany
    {
        return $this->hasMany(ClassificationOption::class)->orderBy("orden");
    }

    public function proyectos() : BelongsToMany
    {
        return $this->belongsToMany(Proyecto::class, "proyecto_classification_data");
    }
}
