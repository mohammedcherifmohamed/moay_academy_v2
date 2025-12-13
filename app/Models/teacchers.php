<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;



class teacchers extends Authenticatable
{
    protected $table ="teachers" ;
    protected $fillable = [
        "name",
        "email",
    "phone",
        "password",
        "status",
    ];
}
