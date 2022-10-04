<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('site_name_en');
            $table->string('site_name_ar');
            $table->string('site_title_en');
            $table->string('site_title_ar');
            $table->string('title_desc_en');
            $table->string('title_desc_ar');
            $table->string('about_us_en');
            $table->string('about_us_ar');
            $table->string('address_en');
            $table->string('address_ar');
            $table->string('phone_en');
            $table->string('phone_ar');
            $table->string('email');

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
        Schema::dropIfExists('settings');
    }
}
