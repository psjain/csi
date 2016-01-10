<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Travelgrant extends Model
{
        protected $fillable = [ 'memid','eventname','date','venue','roleid','justification','mode','grantrequested','amountgranted'];

        public function getMember()	{
    		return $this->hasOne('App\Member', 'id', 'memid');
        }
    	public function getRole()	{
    		return $this->hasOne('App\TravelRole', 'id', 'roleid');
  		}
        public function getDocuments()	{
    		return $this->hasMany('App\TravelDocument', 'id', 'grantid');
    	}
   
}

  