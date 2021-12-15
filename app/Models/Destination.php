<?php

namespace App\Models;

class Destination extends BaseModel
{
    public function tours()
    {
        return $this->hasMany(Tour::class);
    }
}
