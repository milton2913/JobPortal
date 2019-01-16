<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class EducationLevelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $eduLevels = [
            [
                'name' => 'PSC/5 Pass',
                'short_name' => 'psc',
                'description' => '',
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'name' => 'JSC/JDC/8 Pass',
                'short_name' => 'jsc-jdc',
                'description' => '',
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'name' => 'Secondary',
                'short_name' => 'secondary',
                'description' => '',
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'name' => 'Higher Secondary',
                'short_name' => 'higher-secondary',
                'description' => '',
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'name' => 'Diploma',
                'short_name' => 'diploma',
                'description' => '',
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'name' => 'Bachelor/Honors',
                'short_name' => 'bachelor-honors',
                'description' => '',
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'name' => 'Masters',
                'short_name' => 'masters',
                'description' => '',
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'name' => 'PhD (Doctor of Philosophy)',
                'short_name' => 'php',
                'description' => '',
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]
        ];
        DB::table('education_levels')->insert($eduLevels);
    }
}
