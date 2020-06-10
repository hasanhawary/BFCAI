<?php

namespace App;

use Jenssegers\Date\Date;
use Illuminate\Database\Eloquent\Model;

class MatrielData extends Model
{
    protected $guarded = [];
    protected $appends = ['date'];

    public function files()
    {
        return $this->hasMany('App\File', 'relation_id', 'id');
    }

    public function getDateAttribute()
    {
        $local = app()->getLocale();
        \Date::setLocale($local);
        $date = Date::parse($this->end_at)->format('j F Y');
        return $date;
    }
}
