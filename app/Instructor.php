<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Instructor extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'image', 'email', 'password', 'phone',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = ['full_name', 'image_path'];

    public function cources()
    {
        return $this->hasMany(Cource::class, 'user_id', 'id');
    }

    public function getFullNameAttribute($value)
    {
        return 'Dr/' . ' ' . $this->first_name . ' ' . $this->last_name;
    }

    public function getImagePathAttribute()
    {
        return asset('uploads/instructors/profile/' . $this->image);
    }
}
