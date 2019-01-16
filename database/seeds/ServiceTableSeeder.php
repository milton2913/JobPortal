<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class ServiceTableSeeder extends Seeder
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
                'title' => 'Employer',
                'slug' => 'employer',
                'role_id' => '2',
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'title' => 'Job Seeker',
                'slug' => 'job-seeker',
                'role_id' => '3',
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
        ];

        DB::table('services')->insert($items);
    }
}
