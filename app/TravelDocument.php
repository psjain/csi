<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TravelDocument extends Model
{
    protected $fillable = ['document','grantid'];

    public function getDocument()	{
    	return $this->hasOne('App\TravelGrant', 'id', 'grantid');

}
