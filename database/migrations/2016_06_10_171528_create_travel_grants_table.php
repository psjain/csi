<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTravelGrantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('travel_grants', function (Blueprint $table) {
           $table->engine = 'InnoDB';


            $table->bigIncrements('id')->unsigned();
            $table->bigInteger('member_id')->unsigned();
            $table->string('event_name',250);
            $table->string('event_details',2000);
            $table->date('event_date');
            $table->string('event_venue');
            $table->date('journey_start_date');
            $table->date('journey_end_date');
            $table->integer('member_count')->unsigned();
            $table->integer('travel_role_id')->unsigned();
            $table->string('justification',2000);
            $table->string('travel_mode',80);
            $table->double('requested_amount',15, 2);
            $table->double('granted_amount', 15, 2);
            //$table->tinyInteger('is_deleted')->default(0);
            $table->timestamps();
            $table->softDeletes();

          
            $table->foreign('member_id')
                    ->references('id')->on('members')
                    ->onDelete('CASCADE')
                    ->onUpdate('CASCADE');


            $table->foreign('travel_role_id')
                    ->references('id')->on('travel_roles')
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
        Schema::drop('travel_grants');
    }
}
