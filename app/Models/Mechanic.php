<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mechanic extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function carOwner()
    {
        return $this->hasOneThrough(
            Owner::class,
            Car::class
        );

        return $this->hasManyThrough(
            Owner::class,
            Car::class
        );
    }
}
