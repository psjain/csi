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
        Schema::create('travelgrants', function (Blueprint $table) {
            $table->engine = 'InnoDB';


            $table->bigIncrements('id')->unsigned();
            $table->bigInteger('memid')->unsigned();
            $table->string('eventname',250);
            $table->date('date');
            $table->string('venue');
            $table->integer('roleid')->unsigned();
            $table->string('justification',2000);
            $table->string('mode',80);
            $table->double('grantrequested',15, 2);
            $table->double('amountgranted', 15, 2);
            $table->tinyInteger('is_deleted')->default(0);
            $table->timestamps();


          
            $table->foreign('memid')
                    ->references('id')->on('members')
                    ->onDelete('CASCADE')
                    ->onUpdate('CASCADE');


            $table->foreign('roleid')
                    ->references('id')->on('travelroles')
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
        Schema::drop('travelgrants');
    }
}
