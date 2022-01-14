<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Continent extends Model
{
    protected $guarded=[];
    public function animals()
    {
        return $this->belongsToMany(Animal::class);
    }
}
