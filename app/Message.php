<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $guarded = [];

    public function files()
    {
        return $this->hasMany('App\File', 'relation_id', 'id');
    }

}
