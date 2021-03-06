<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public function rooms()
    {
    	return $this->hasMany(Restaurants::class);
    }
}
