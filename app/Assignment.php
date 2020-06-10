<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Date\Date;

class Assignment extends Model
{
    protected $table = 'assignments';
    protected $guarded = [];
    protected $appends = ['date', 'duration', 'date_now'];

    public function ass_result()
    {
        return $this->hasMany(AssignmentResult::class, 'assignment_id', 'id');

    }

    public function user()
    {
        return $this->belongsTo(Instructor::class, 'instructor_id', 'id');
    }

    public function files()
    {
        return $this->hasMany('App\File', 'relation_id', 'id');
    }

    public function cource()
    {
        return $this->belongsTo('App\Cource', 'cource_id', 'id');
    }

    public function getDateAttribute()
    {
        $local = app()->getLocale();
        \Date::setLocale($local);
        $date = Date::parse($this->end_at)->format('j F Y');
        return $date;
    }
    public function getDateNowAttribute()
    {
        $local = app()->getLocale();
        \Date::setLocale($local);
        $now = \Date::now()->format('j F Y');
        return $now;
    }

    public function getDurationAttribute()
    {
        $local = app()->getLocale();
        \Date::setLocale($local);

        $start_at = Date::parse($this->satrt_at)->format('j');
        $end_at = Date::parse($this->end_at)->format('j');
        $duration = $end_at - $start_at;
        return $duration;
    }
}
