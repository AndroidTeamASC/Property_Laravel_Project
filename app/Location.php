<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    //
    protected $fillable = [
        'property_id','address','longitude','latitude'
    ];
    public function property()
    {
        return $this->belongsTo('App\Property');
    }
}
