<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    public function up()
    {
        Schema::create('fyp_events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('description');
            $table->timestamp('startdate')->default(now());
            $table->timestamp('enddate')->default(now());
            $table->float('event_grade', 5,2)->default(0);
            $table->timestamps();
        });

        DB::table('fyp_events')->insert(
            array(
                'title' => 'Project Proposal',
                'description' => 'Project Proposal Deadline',
                'event_grade' => 20.0,
            )
        );

        DB::table('fyp_events')->insert(
            array(
                'title' => 'Project Presentation',
                'description' => 'Submit slides and attend project presentation',
                'event_grade' => 20.0,
            )
        );

        DB::table('fyp_events')->insert(
            array(
                'title' => 'Agreement Form',
                'description' => 'Deadline for agreement form',
                'event_grade' => 20.0,
            )
        );

        DB::table('fyp_events')->insert(
            array(
                'title' => 'Making Scheme Form',
                'description' => 'Deadline for Making Scheme Form',
                'event_grade' => 20.0,
            )
        );

        DB::table('fyp_events')->insert(
            array(
                'title' => 'Interim Report',
                'description' => 'Deadline for Interim Report',
                'event_grade' => 20.0,
            )
        );

        DB::table('fyp_events')->insert(
            array(
                'title' => 'Draft Report',
                'description' => 'Deadline for Draft Report',
                'event_grade' => 20.0,
            )
        );

        DB::table('fyp_events')->insert(
            array(
                'title' => 'Demo Day',
                'description' => 'Demo Data',
                'event_grade' => 20.0,
            )
        );

        DB::table('fyp_events')->insert(
            array(
                'title' => 'Product Submission',
                'description' => 'Deadline for Product Submission',
                'event_grade' => 20.0,
            )
        );

        DB::table('fyp_events')->insert(
            array(
                'title' => 'Final Report',
                'description' => 'Deadline for Final Report Submission',
                'event_grade' => 20.0,
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fyp_events');
    }
}
