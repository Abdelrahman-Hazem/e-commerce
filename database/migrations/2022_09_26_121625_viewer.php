<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Viewer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    
        public function up()
    {
        Schema::create('viewers', function (Blueprint $table) {
            $table->id(); 
            $table->string('name'); 
            $table->integer('number_of_viewers');
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
        //
    }
}
