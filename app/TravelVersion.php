<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TravelVersion extends Model
{	
	use SoftDeletes;

    
    protected $dates = ['deleted_at'];
    protected $fillable = ['grantid','status','comments'];

      public function getGrant()	{
    		return $this->hasOne('App\TravelGrant', 'grantid', 'grantid');
        }

}
