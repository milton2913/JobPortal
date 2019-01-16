<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class CertificationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            [
                'title' => 'CCNA',
                'location' => 'Dhanmondi,Dhaka',
                'institute' => 'Skill.Jobs',
                'user_id' => '1',
                'start_period' => Carbon::now()->toDateString(),
                'end_period' => Carbon::now()->toDateString(),
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'title' => 'AEND',
                'location' => 'Dhanmondi,Dhaka',
                'institute' => 'Skill.Jobs',
                'user_id' => '1',
                'start_period' => Carbon::now()->toDateString(),
                'end_period' => Carbon::now()->toDateString(),
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'title' => 'CCNA',
                'location' => 'Dhanmondi,Dhaka',
                'institute' => 'Skill.Jobs',
                'user_id' => '2',
                'start_period' => Carbon::now()->toDateString(),
                'end_period' => Carbon::now()->toDateString(),
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],


        ];
        DB::table('certifications')->insert($items);
    }
}
