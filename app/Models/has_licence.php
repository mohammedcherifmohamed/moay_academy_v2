<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class has_licence extends Model
{
     protected $table = 'has_licence';

     protected $fillable = [
        'is_autherized',
        'Message',
     ] ;
}
