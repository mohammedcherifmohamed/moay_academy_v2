<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class teacchers extends Model
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
