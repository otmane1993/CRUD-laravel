<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    protected $guarded=[];
    public function family()
    {
        return $this->belongsTo(Family::class);
    }
    public function continents()
    {
        return $this->belongsToMany(Continent::class);
    }
}
