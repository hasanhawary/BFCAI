<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matriel extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(Instructor::class, 'instructor_id', 'id');
    }
}
