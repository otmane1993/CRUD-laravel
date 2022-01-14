<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Family extends Model
{
    protected $guarded=[];
    public function animals()
    {
        return $this->hasMany(Animal::class);
    }
}
