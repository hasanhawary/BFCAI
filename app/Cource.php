<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cource extends Model
{
    protected $guarded = [];

    public function instructor()
    {
        return $this->belongsTo(Instructor::class, 'user_id', 'id');
    }
}
