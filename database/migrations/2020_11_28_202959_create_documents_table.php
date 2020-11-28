<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *        'filename',
    'data',
    'fyp_es_id',
    'user_id',
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {

            $table->id();
            $table->text('filename');
            $table->longText('data');
            $table->timestamps();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('fyp_es_id')->unsigned();

            $table->foreign('fyp_es_id')->references('id')->on('fyp_event_states')
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
        Schema::dropIfExists('documents');
    }
}
