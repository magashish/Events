<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->integer('event_category_id');
            $table->string('event_name');
            $table->date('event_date');
            $table->string('event_start_time');
            $table->string('event_end_time');
            $table->string('event_price');
            $table->string('event_waiver');
            $table->string('timezone');
            $table->string('event_location');
            $table->string('event_logo');
            $table->string('event_logo_url');
            $table->string('event_headline');
            $table->string('event_description');
            $table->date('registration_start_date');
            $table->date('registration_end_date');
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
        Schema::dropIfExists('events');
    }
}
