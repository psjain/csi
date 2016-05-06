<?php
use App\TravelRole;
use Illuminate\Database\Seeder;


class TravelRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
         DB::table('travelroles')->delete();

         TravelRole::create(['role'=>'presenter']);
         TravelRole::create(['role'=>'researcher']);
         TravelRole::create(['role'=>'attendee']);
    }
}
