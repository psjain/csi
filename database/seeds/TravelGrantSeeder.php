<?php

use Illuminate\Database\Seeder;

use App\TravelGrant;



class TravelGrantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $request= new TravelGrant;
        $request->member_id=1;
        $request->event_name="event 1";
        $request->event_details="www.google.com Organization ";
        $request->event_date="01-06-2016";
        $request->event_venue="Venue 1";
        $request->journey_start_date="01-06-2016";
        $request->journey_end_date="01-06-2016";
        $request->member_count=1;
        $request->travel_role_id=1;
        $request->justification="I need Money";
        $request->travel_mode="Train";
        $request->requested_amount=1000;
        $request->granted_amount=0;
       // $request->deleted_at="NULL";
        $request->save();

        $request= new TravelGrant;
        $request->member_id=2;
        $request->event_name="event 2";
        $request->event_details="www.google.com Organization ";
        $request->event_date="02-06-2016";
        $request->event_venue="Venue 2";
        $request->journey_start_date="02-06-2016";
        $request->journey_end_date="02-06-2016";
        $request->member_count=2;
        $request->travel_role_id=2;
        $request->justification="I need Money";
        $request->travel_mode="Train";
        $request->requested_amount=2000;
        $request->granted_amount=0;
        //$request->deleted_at="NULL";
        $request->save();


        $request= new TravelGrant;
        $request->member_id=3;
        $request->event_name="event 3";
        $request->event_details="www.google.com Organization ";
        $request->event_date="03-06-2016";
        $request->event_venue="Venue 3";
        $request->journey_start_date="03-06-2016";
        $request->journey_end_date="03-06-2016";
        $request->member_count=3;
        $request->travel_role_id=3;
        $request->justification="I need Money";
        $request->travel_mode="Train";
        $request->requested_amount=3000;
        $request->granted_amount=0;
       // $request->deleted_at="NULL";
        $request->save();


        $request= new TravelGrant;
        $request->member_id=4;
        $request->event_name="event 4";
        $request->event_details="www.google.com Organization ";
        $request->event_date="04-06-2016";
        $request->event_venue="Venue 4";
        $request->journey_start_date="04-06-2016";
        $request->journey_end_date="04-06-2016";
        $request->member_count=4;
        $request->travel_role_id=1;
        $request->justification="I need Money";
        $request->travel_mode="Train";
        $request->requested_amount=4000;
        $request->granted_amount=0;
        //$request->deleted_at="NULL";
        $request->save();


        $request= new TravelGrant;
        $request->member_id=5;
        $request->event_name="event 5";
        $request->event_details="www.google.com Organization ";
        $request->event_date="05-06-2016";
        $request->event_venue="Venue 5";
        $request->journey_start_date="05-06-2016";
        $request->journey_end_date="05-06-2016";
        $request->member_count=5;
        $request->travel_role_id=2;
        $request->justification="I need Money";
        $request->travel_mode="Train";
        $request->requested_amount=5000;
        $request->granted_amount=0;
       // $request->deleted_at="NULL";
        $request->save();




        $request= new TravelGrant;
        $request->member_id=1;
        $request->event_name="event 11";
        $request->event_details="www.google.com Organization ";
        $request->event_date="06-06-2016";
        $request->event_venue="Venue 11";
        $request->journey_start_date="06-06-2016";
        $request->journey_end_date="06-06-2016";
        $request->member_count=11;
        $request->travel_role_id=3;
        $request->justification="I need Money";
        $request->travel_mode="Train";
        $request->requested_amount=11000;
        $request->granted_amount=0;
        //$request->deleted_at="NULL";
        $request->save();

        $request= new TravelGrant;
        $request->member_id=2;
        $request->event_name="event 22";
        $request->event_details="www.google.com Organization ";
        $request->event_date="22-06-2016";
        $request->event_venue="Venue 22";
        $request->journey_start_date="22-06-2016";
        $request->journey_end_date="22-06-2016";
        $request->member_count=22;
        $request->travel_role_id=1;
        $request->justification="I need Money";
        $request->travel_mode="Train";
        $request->requested_amount=22000;
        $request->granted_amount=0;
      //  $request->deleted_at="NULL";
        $request->save();


        $request= new TravelGrant;
        $request->member_id=3;
        $request->event_name="event 33";
        $request->event_details="www.google.com Organization ";
        $request->event_date="06-06-2016";
        $request->event_venue="Venue 33";
        $request->journey_start_date="06-06-2016";
        $request->journey_end_date="06-06-2016";
        $request->member_count=33;
        $request->travel_role_id=2;
        $request->justification="I need Money";
        $request->travel_mode="Train";
        $request->requested_amount=33000;
        $request->granted_amount=0;
       // $request->deleted_at="NULL";
        $request->save();


        $request= new TravelGrant;
        $request->member_id=4;
        $request->event_name="event 44";
        $request->event_details="www.google.com Organization ";
        $request->event_date="08-06-2016";
        $request->event_venue="Venue 44";
        $request->journey_start_date="08-06-2016";
        $request->journey_end_date="08-06-2016";
        $request->member_count=44;
        $request->travel_role_id=3;
        $request->justification="I need Money";
        $request->travel_mode="Train";
        $request->requested_amount=44000;
        $request->granted_amount=0;
        //$request->deleted_at="NULL";
        $request->save();


        $request= new TravelGrant;
        $request->member_id=5;
        $request->event_name="event 55";
        $request->event_details="www.google.com Organization ";
        $request->event_date="10-06-2016";
        $request->event_venue="Venue 55";
        $request->journey_start_date="10-06-2016";
        $request->journey_end_date="10-06-2016";
        $request->member_count=55;
        $request->travel_role_id=1;
        $request->justification="I need Money";
        $request->travel_mode="Train";
        $request->requested_amount=55000;
        $request->granted_amount=0;
       // $request->deleted_at="NULL";
        $request->save();



    }
}
