<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTravelDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('traveldocs', function (Blueprint $table) {
            $table->engine = 'InnoDB';


            $table->increments('id')->unsigned();
            $table->bigInteger('grantid')->unsigned();
            $table->string('document');
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
      Schema::drop('traveldocs');
    }
}
