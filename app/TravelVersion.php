<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Travelversion extends Model
{	
    protected $fillable = ['grantid','status','comments'];

	public function getGrant()	{
		return $this->hasOne('App\TravelGrant', 'grantid', 'grantid');
	}
	public function scopeGetLatestVersion($query)	{
		return $query->orderBy('id', 'desc')->first();
	}

	public function scopeGetLatestVersionStatus($query)	{
		return $query->orderBy('id', 'desc')->first()->status;
	}

	public function scopeGetLatestVersionsByGrantID($query, $id)	{
		return $query->where('grantid',$id);
	}
	
}
