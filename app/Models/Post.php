<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function videos()
    {
        return $this->morphedByMany(Video::class, 'postable');
    }

    public function audios()
    {
        return $this->morphedByMany(Audio::class, 'postable');
    }
}
