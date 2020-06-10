<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Announcment extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(Instructor::class, 'user_id', 'id');
    }
}
