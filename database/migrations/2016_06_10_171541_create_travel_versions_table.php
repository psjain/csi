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
        Schema::create('travel_versions', function (Blueprint $table) {
             $table->engine = 'InnoDB';


            
            $table->increments('id')->unsigned();
            $table->bigInteger('travel_grant_id')->unsigned();
            $table->integer('travel_request_status_id')->unsigned(); 
            $table->string('comments',2000)->nullable();
            //$table->tinyInteger('is_deleted')->default(0);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('travel_grant_id')
                    ->references('id')->on('travel_grants')
                    ->onDelete('CASCADE')
                    ->onUpdate('CASCADE');

            $table->foreign('travel_request_status_id')
                    ->references('id')->on('travel_request_statuses')
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
        Schema::drop('travel_versions');
    }
}
