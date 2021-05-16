<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('projects')->insert([
            'ngo_id' => 1,
            'name' => 'The Lost Food Project',
            'skill' => 'JS',
            'goal' => ' A centralized donation application with the aims of onboarding and engaging with more potential food donors by streamlining the process of collecting food donations for neighborhood grocers. ',
            'start_date' => '2021-03-27 00:55:18',
            'end_date' => '2021-03-27 00:55:18',
            'timezone' => 'US -8',
            'country' => 'US',
            'commitment' => 18,
            'description' => 'A centralized donation application with the aims of onboarding and engaging with more potential food donors by streamlining the process of collecting food donations for neighborhood grocers. A centralized donation application with the aims of onboarding and engaging with more potential food donors by streamlining the process of collecting food donations for neighborhood grocers. ',
            'contact_name' => 'Anni (DALAO)',
            'contact_email' => 'anni@dalao.duke.edu',
            'status' => 'recruiting',
            'swe_needed' => true,
            'pm_needed' => true,
            'd_needed' => true,
        ]);
        DB::table('projects')->insert([
            'ngo_id' => 1,
            'name' => 'The Lost Food Project',
            'skill' => 'JS',
            'goal' => ' A centralized donation application with the aims of onboarding and engaging with more potential food donors by streamlining the process of collecting food donations for neighborhood grocers. ',
            'start_date' => '2021-03-27 00:55:18',
            'end_date' => '2021-03-27 00:55:18',
            'timezone' => 'US -8',
            'country' => 'US',
            'commitment' => 18,
            'description' => 'A centralized donation application with the aims of onboarding and engaging with more potential food donors by streamlining the process of collecting food donations for neighborhood grocers. A centralized donation application with the aims of onboarding and engaging with more potential food donors by streamlining the process of collecting food donations for neighborhood grocers. ',
            'contact_name' => 'Anni (DALAO)',
            'contact_email' => 'anni@dalao.duke.edu',
            'status' => 'finished',
            'reflection' => 'A great project balalalal',
            'swe_needed' => false,
            'pm_needed' => true,
            'd_needed' => true,
        ]);
    }
}
