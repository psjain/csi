<?php

use App\Travelgrant;
use Illuminate\Database\Seeder;

class TravelGrantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        

DB::table('travelgrants')->delete();

		Travelgrant::create(['memid'=>11,'eventname'=>'conference','date'=>'2016-02-02','venue'=>'delhi','roleid'=>1,'justification'=>'hello','mode'=>'flight','grantrequested'=>100000]);
		Travelgrant::create(['memid'=>12,'eventname'=>'meeting','date'=>'2016-02-02','venue'=>'paris','roleid'=>2,'justification'=>'hello','mode'=>'flight','grantrequested'=>100000,'amountgranted'=>5000]);
		Travelgrant::create(['memid'=>16,'eventname'=>'party','date'=>'2016-02-02','venue'=>'vegas','roleid'=>3,'justification'=>'hello','mode'=>'flight','grantrequested'=>100000]);
   

    }
}
