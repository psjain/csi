<?php

use Illuminate\Database\Seeder;
use App\TravelRole;

class TravelRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	//TravelRole::all()->delete();

        $role= new TravelRole;
        $role->role="Presentor";
        $role->save();

        $role= new TravelRole;
        $role->role="Researcher";
        $role->save();

        $role= new TravelRole;
        $role->role="Attendee";
        $role->save();
    }
}
