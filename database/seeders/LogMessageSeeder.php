<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LogMessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('log_messages')->insert([
            'tag' => 'LogMessage::Class',
            'message' => 'helloworld',
            'type' => 'INFO',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
