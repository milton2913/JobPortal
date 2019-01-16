<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class ResultTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $resultTypes = [
            [
                'name' => 'First Division/Class',
                'slug' => 'first-division-class',
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'name' => 'Second Division/Class',
                'slug' => 'second-division-class',
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'name' => 'Third Division/Class',
                'slug' => 'third-division-class',
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'name' => 'Grade',
                'slug' => 'grade',
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'name' => 'Appeared',
                'slug' => 'appeared',
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'name' => 'Enrolled',
                'slug' => 'enrolled',
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'name' => 'Awarded',
                'slug' => 'awarded',
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'name' => 'Do not mention',
                'slug' => 'do-not-mention',
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'name' => 'Pass',
                'slug' => 'pass',
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]
        ];
        DB::table('result_types')->insert($resultTypes);
    }
}
