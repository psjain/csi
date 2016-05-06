<?php
use App\TravelVersion;
use Illuminate\Database\Seeder;

class TravelVersionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	 DB::table('travelversions')->delete();

        TravelVersion::create(['grantid'=>1,'status'=>'approved','comments'=>'no comments']);
        TravelVersion::create(['grantid'=>2,'status'=>'pending','comments'=>'no comments']);
        TravelVersion::create(['grantid'=>3,'status'=>'pending','comments'=>'no comments']);
        

        //
    }
}
