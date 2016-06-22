<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
 use Illuminate\Database\Eloquent\SoftDeletes;

class TravelDoc extends Model
{
    //Relationships

    public function travelversion()
    {
        return $this->belongsTo('App\TravelVersion');
    }

	//Soft Delete
   use SoftDeletes;
    protected $dates = ['deleted_at'];

    //Fillable
    protected $fillable = ['document','travel_version_id'];

    
}
