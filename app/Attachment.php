<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    //
    protected $fillable = [
        'property_id','file'
    ];
}
