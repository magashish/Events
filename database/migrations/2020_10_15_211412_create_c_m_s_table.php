<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCMSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c_m_s', function (Blueprint $table) {
            $table->id();
            $table->string('page_title')->nullable();
            $table->string('office_email')->nullable();
            $table->string('office_address')->nullable();
            $table->string('office_contact')->nullable();
            $table->string('page_image1')->nullable();
            $table->string('page_image2')->nullable();
            $table->string('page_image3')->nullable();
            $table->string('page_description')->nullable();
            $table->string('short_headline')->nullable();
            $table->string('primary_headline')->nullable();
            $table->string('about_us_headline')->nullable();
            $table->string('about_us_description')->nullable();
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
        Schema::dropIfExists('c_m_s');
    }
}
