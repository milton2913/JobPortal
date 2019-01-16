<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class JobLevelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $job_levels = [
            [
                'title'=>'Top',
                'slug'=>'top',
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'title'=>'Mid',
                'slug'=>'mid',
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'title'=>'Entry',
                'slug'=>'entry',
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
        ];

        DB::table('job_levels')->insert($job_levels);
    }
}
