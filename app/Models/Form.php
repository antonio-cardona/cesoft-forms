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

    public function answers() : HasMany
    {
        return $this->hasMany(Answer::class);
    }

    public function formAreas() : HasMany
    {
        return $this->hasMany(FormArea::class);
    }
}
