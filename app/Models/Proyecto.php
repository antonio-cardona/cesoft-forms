<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
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
}
