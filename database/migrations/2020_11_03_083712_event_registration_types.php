<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EventRegistrationTypes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_registration_types', function (Blueprint $table) {
            $table->id();
            $table->integer('event_id');
            $table->string('team_type');
            $table->integer('team_size');
            $table->string('event_category_name');
            $table->string('event_category_fees');
            $table->string('event_category_details');
            $table->string('event_schedule_details');
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
        Schema::dropIfExists('event_registration_types');
    }
}
