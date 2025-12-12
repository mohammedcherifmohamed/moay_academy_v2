<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;



class admins extends Authenticatable
{
    protected $table = 'admins';
    protected $fillable = [
        'name',
        'email',
        'password',
    ];
    
}
