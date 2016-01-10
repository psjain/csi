<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTravelRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('travelroles', function (Blueprint $table) {
            $table->engine = 'InnoDB';


            $table->increments('id')->unsigned();
            $table->string('role',500);
             $table->timestamps();
           
            
       });    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {  
        Schema::drop('roles');
    }
}
