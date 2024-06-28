<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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

    public function areas() : HasMany
    {
        return $this->hasMany(FormArea::class);
    }

    public function answers() : HasMany
    {
        return $this->hasMany(Answer::class);
    }
}
