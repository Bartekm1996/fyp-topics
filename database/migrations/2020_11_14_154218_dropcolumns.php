<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Dropcolumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('log_messages', function (Blueprint $table) {
            /*
             * Drop these test columns
             */
            $table->removeColumn('testcol');
            $table->removeColumn('added');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('log_messages', function (Blueprint $table) {
            //
        });
    }
}
