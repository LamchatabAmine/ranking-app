<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    public function parentCity()
    {
        return $this->belongsTo(City::class, 'parent_city_id');
    }

    public function childCities()
    {
        return $this->hasMany(City::class, 'parent_city_id');
    }
}
