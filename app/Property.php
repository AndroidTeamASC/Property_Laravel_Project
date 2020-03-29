<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    //
    protected $fillable = [
        'status_id', 'type_id', 'agent_id','feature_id', 'tag_id', 'title', 'bedroom', 'bathroom', 'garage', 'build_year', 'land_area', 'building_area', 'description', 'keyword', 'price', 'embed_code', 'property_status'
    ];
    public function status()
    {
    	return $this->belongsTo('App\Status');
    }
    public function type()
    {
    	return $this->belongsTo('App\Type');
    }
    public function agent()
    {
        return $this->belongsTo('App\User', 'agent_id');
    }
    public function location()
    {
        return $this->belongsTo('App\Location','id','property_id');
    }
    public function gallery()
    {
        return $this->belongsTo('App\Gallery','id','property_id');
    }

    public function galleries()
    {
        return $this->hasMany('App\Gallery');
    }

    public function floors()
    {
        return $this->hasMany('App\Floor');
    }
}
