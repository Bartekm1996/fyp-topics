<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     *
     'started_on',
    'finished_on',
    'finished_grade',
    'state',
    'fypevent_id',
    'user_id',
     * @return void
     */
    public function up()
    {
        Schema::create('fyp_event_states', function (Blueprint $table) {
            $table->id();
            $table->integer('state')->default(0);
            $table->timestamp('started_on')->nullable();
            $table->timestamp('finished_on')->nullable();
            $table->float('finished_grade', )->unsigned();
            $table->timestamps();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('fypevent_id')->unsigned();

            $table->foreign('fypevent_id')->references('id')->on('fyp_events')
                ->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fyp_event_states');
    }
}
