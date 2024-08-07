<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Proyecto extends Model
{
    /**
     * Get the Area for the Proyecto.
     */
    public function areas(): HasMany
    {
        return $this->hasMany(Area::class);
    }

    public function forms(): HasMany
    {
        return $this->hasMany(Form::class);
    }

    public function proyectoClassificationData(): HasMany
    {
        return $this->hasMany(ProyectoClassificationData::class);
    }

    public function classificationData() : BelongsToMany
    {
        return $this->belongsToMany(ClassificationData::class, "proyecto_classification_data");
    }

    public function deleteAreas() {
        $areas = $this->areas;
        foreach ($areas as $area) {
            $area->deletePreguntas();
            $area->delete();
        }
    }
}
