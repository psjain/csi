<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\TravelRole;



class TravelGrant extends Model
{
	//Relationships
	 public function member() {
            return $this->belongsTo('App\Member');
        }
    public function role()   {
            return $this->belongsTo('App\TravelRole');
        }
     
        
    public function documents()  {
            return $this->hasMany('App\TravelDoc');
        }
    public function individual() {
            return $this->hasOne('App\Individual');
        }
    public function travelversions() {
            return $this->hasMany('App\TravelVersion');
        }

 



    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = [ 'member_id','event_name','event_details','event_date','event_venue','journey_start_date','journey_end_date','member_count','travel_role_id','justification','travel_mode','requested_amount','granted_amount'];



    public function scopeGetAttributeValue($query,$attribute,$id) {
        return $query->where('id',$id)->value($attribute);
            }

    public function scopeMemberGrantRequests($query,$member_id){
        return $query->where('member_id',$member_id)->get();
            }
    public function scopegetRole($query,$id){     
        return TravelRole::where('id',$id)->value('role');        
            }
   

    
    


    


}
