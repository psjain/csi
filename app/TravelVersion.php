<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\TravelRequestStatus;


class TravelVersion extends Model
{

	//Relationships

    public function travelgrant()
    {
        return $this->belongsTo('App\TravelGrant');
    }

    public function versiondocument()
    {
        return $this->hasOne('App\TravelDoc');
    }

    public function travelgrantstatus()
    {
        return $this->belongsTo('App\TravelRequestStatus');
    }

	//Soft Delete
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    //Fillable
    protected $fillable = ['travel_grant_id','travel_request_status_id','comments'];



    //Scope Methods
    public function scopeGetLatestVersion($query)	{
		return $query->orderBy('id', 'desc')->first();
	}

    public function scopeGetLatestVersionStatus($query) {
        return $query->orderBy('id', 'desc')->first()->status;
    }

    public function scopeGetLatestVersionsByGrantID($query, $id)    {
        return $query->where('travel_grant_id',$id);
    }

    public function scopeUpdateStatus($query,$status)    {
        return $query->orderBy('id', 'desc')->first()->update(['travel_request_status_id'=>$status]);
    }
     public function scopegetStatus($query,$id){
        return TravelRequestStatus::where('id',$id)->value('status');        
            }
    public function scopegetcomments($query,$id){
        return $query->where('id',$id)->value('comments');        
            }

	
	

}
