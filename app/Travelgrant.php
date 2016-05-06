<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
        public function individual() {
            return $this->hasOne('App\Individual', 'member_id', 'memid');
        }
        public function versions() {
            return $this->hasMany('App\TravelVersion', 'grantid', 'id');
        }
        
}

  