<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TravelVersion extends Model
{
    protected $fillable = ['grantid','status','comments'];

      public function getGrant()	{
    		return $this->hasOne('App\TravelGrant', 'grantid', 'grantid');
        }

}
