<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NGOSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ngos')->insert([
            'user_id' => 0,
            'name' => 'The Lost Food NGO',
            'cause' => 'a cause',
        ]);
    }
}
