<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class courses extends Model
{
    public $timestamps = false;
    protected $fillable = ['title', 'teacher'];
}
