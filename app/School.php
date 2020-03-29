<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    //
    protected $fillable = [
        'property_id','school_name','rating','grade','distance'
    ];
}
