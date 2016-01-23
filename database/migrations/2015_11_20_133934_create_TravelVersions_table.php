<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTravelVersionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('travelversions', function (Blueprint $table) {
            $table->engine = 'InnoDB';


            $table->bigInteger('grantid')->unsigned();
            $table->increments('id')->unsigned();
            $table->string('status');  
            $table->string('comments',2000)->nullable();
            $table->timestamps();
          
            $table->foreign('grantid')
                    ->references('id')->on('travelgrants')
                    ->onDelete('CASCADE')
                    ->onUpdate('CASCADE');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
     Schema::drop('travelversions');    
    }
}
