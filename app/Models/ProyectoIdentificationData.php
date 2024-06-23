<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProyectoIdentificationData extends Model
{
    public function proyecto(): BelongsTo
    {
        return $this->belongsTo(Proyecto::class);
    }
}
