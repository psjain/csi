<?php

use Illuminate\Database\Seeder;
use App\TravelVersion;


class TravelVersionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $version= new TravelVersion;
        $version->travel_grant_id=1;
        $version->travel_request_status_id=1;
        $version->comments="Comments";
        $version->save();

        $version= new TravelVersion;
        $version->travel_grant_id=2;
        $version->travel_request_status_id=1;
        $version->comments="Comments";
        $version->save();

        $version= new TravelVersion;
        $version->travel_grant_id=3;
        $version->travel_request_status_id=1;
        $version->comments="Comments";
        $version->save();

        $version= new TravelVersion;
        $version->travel_grant_id=4;
        $version->travel_request_status_id=1;
        $version->comments="Comments";
        $version->save();

        $version= new TravelVersion;
        $version->travel_grant_id=5;
        $version->travel_request_status_id=1;
        $version->comments="Comments";
        $version->save();

        $version= new TravelVersion;
        $version->travel_grant_id=6;
        $version->travel_request_status_id=1;
        $version->comments="Comments";
        $version->save();

        $version= new TravelVersion;
        $version->travel_grant_id=7;
        $version->travel_request_status_id=1;
        $version->comments="Comments";
        $version->save();

        $version= new TravelVersion;
        $version->travel_grant_id=8;
        $version->travel_request_status_id=1;
        $version->comments="Comments";
        $version->save();

        $version= new TravelVersion;
        $version->travel_grant_id=9;
        $version->travel_request_status_id=1;
        $version->comments="Comments";
        $version->save();

        $version= new TravelVersion;
        $version->travel_grant_id=10;
        $version->travel_request_status_id=1;
        $version->comments="Comments";
        $version->save();
    }
}
