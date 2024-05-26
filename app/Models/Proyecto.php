<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Proyecto extends Model
{
    /**
     * Get the AreaNivelSuperior for the Proyecto.
     */
    public function areas(): HasMany
    {
        return $this->hasMany(AreaNivelSuperior::class);
    }


}
