<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTravelDocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('travel_docs', function (Blueprint $table) {
            $table->engine = 'InnoDB';


            $table->increments('id')->unsigned();
            
            $table->integer('travel_version_id')->unsigned();
            $table->string('document');
            //$table->tinyInteger('is_deleted')->default(0);
            $table->timestamps();
            $table->softDeletes();

           

            $table->foreign('travel_version_id')
                    ->references('id')->on('travel_versions')
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
        Schema::drop('travel_docs');
    }
}
