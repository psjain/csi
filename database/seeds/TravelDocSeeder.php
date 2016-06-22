<?php

use Illuminate\Database\Seeder;
use App\TravelDoc;


class TravelDocSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $doc= new TravelDoc;
        //$doc->travel_grant_id=1;
        $doc->travel_version_id=1;
        $doc->document="1_1_1.pdf";
        $doc->save();

        $doc= new TravelDoc;
        
        $doc->travel_version_id=2;
        $doc->document="2_2_2.pdf";
        $doc->save();

        $doc= new TravelDoc;
        
        $doc->travel_version_id=3;
        $doc->document="3_3_3.pdf";
        $doc->save();

        $doc= new TravelDoc;
        
        $doc->travel_version_id=4;
        $doc->document="4_4_4.pdf";
        $doc->save();

        $doc= new TravelDoc;
        
        $doc->travel_version_id=5;
        $doc->document="5_5_5.pdf";
        $doc->save();

        $doc= new TravelDoc;
        
        $doc->travel_version_id=6;
        $doc->document="1_6_6.pdf";
        $doc->save();

        $doc= new TravelDoc;
        
        $doc->travel_version_id=7;
        $doc->document="2_7_7.pdf";
        $doc->save();

        $doc= new TravelDoc;
        
        $doc->travel_version_id=8;
        $doc->document="3_8_8.pdf";
        $doc->save();

        $doc= new TravelDoc;
        
        $doc->travel_version_id=9;
        $doc->document="4_9_9.pdf";
        $doc->save();

        $doc= new TravelDoc;
        
        $doc->travel_version_id=10;
        $doc->document="5_10_10.pdf";
        $doc->save();




    }
}
