<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Traveldocs extends Model
{
	use SoftDeletes;

    
    protected $dates = ['deleted_at'];

    protected $fillable = ['document','grantid'];

    public function getDocument()	{
    	return $this->hasOne('App\TravelGrant', 'id', 'grantid');

	}
}