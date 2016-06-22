<?php

use Illuminate\Database\Seeder;
use App\TravelRequestStatus;

class TravelRequestStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //TravelRequestStatus::delete();

        $status= new TravelRequestStatus;
        $status->status="Pending";
        $status->save();

        $status= new TravelRequestStatus;
        $status->status="Approved";
        $status->save();

        $status= new TravelRequestStatus;
        $status->status="Rejected";
        $status->save();

        $status= new TravelRequestStatus;
        $status->status="Revised";
        $status->save();

        $status= new TravelRequestStatus;
        $status->status="Cancelled";
        $status->save();
    }
}
