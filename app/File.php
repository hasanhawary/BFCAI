<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $guarded = [];

    public function type_file()
    {
        return $this->belongsTo('App\File', 'relation_id', 'id');
    }

}
