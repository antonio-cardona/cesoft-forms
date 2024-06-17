<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ClassificationOption extends Model
{
    public function classificationData(): BelongsTo
    {
        return $this->belongsTo(ClassificationData::class);
    }
}
