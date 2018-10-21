<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class School1 extends Authenticatable
{
    use Notifiable;
    protected $guarded = [];

    protected $hidden = [
        'remember_token',
    ];

    public function students()
    {
        /*$students = User::whereHas('roles', function ($q) {
            $q->where('name', 'student');
        })->where('school_id', $this->id)->get();*/

        return $this->hasMany('App\User')->whereHas('roles', function ($q) {
            $q->where('name', 'student');
        });
    }
}
