<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TravelRequestStatus extends Model
{
	//Relationships

    public function travelversion()
    {
        return $this->hasMany('App\TravelVersion');
    }



    protected $fillable = ['status'];

    public function scopegetStatus($query)
    {
    	return $query->where('id',$id->travel_request_status_id)->value('status');
    }
}
