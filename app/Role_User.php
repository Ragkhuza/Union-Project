<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role_User extends Model
{
    public $timestamps = false;
    protected $guarded = [];
    protected $table = 'role_user';
}
