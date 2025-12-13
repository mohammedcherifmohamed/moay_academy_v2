<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class students extends Authenticatable
{
    protected $table ="students" ;
protected $fillable = [
    "name",
    "email",
    "password",
    "phone",
    "status",
];
}
