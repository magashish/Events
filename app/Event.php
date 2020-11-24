<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    //
    public function registrationTypes()
    {
        return $this->hasMany(EventRegistrationType::class);
    }
}
