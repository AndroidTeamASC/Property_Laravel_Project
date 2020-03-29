<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Neighborhood extends Model
{
    //
    protected $fillable = [
        'property_id','transportation_id','place','duration'
    ];
}
