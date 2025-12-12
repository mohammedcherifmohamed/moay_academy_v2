<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class students extends Model
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
