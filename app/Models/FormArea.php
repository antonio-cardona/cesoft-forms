<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class FormArea extends Model
{
    public function form() : BelongsTo
    {
        return $this->belongsTo(Form::class);
    }

    public function area() : HasOne
    {
        return $this->hasOne(Area::class);
    }
}
