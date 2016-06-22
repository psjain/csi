<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class TravelRole extends Model
{

	public function travelgrant()
    {
        return $this->hasMany('App\TravelGrant');
    }
    

    
    protected $fillable = ['role'];

   

   
}
