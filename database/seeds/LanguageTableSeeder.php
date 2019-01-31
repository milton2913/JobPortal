<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class LanguageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $items=[
            [
                'title' => 'Bengali',
                'is_official' => 'T',
                'percentage' => '97.7',
                'country_id' => '19',
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'title' => 'Chakma',
                'is_official' => 'F',
                'percentage' => '0.1',
                'country_id' => '19',
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'title' => 'Garo',
                'is_official' => 'F',
                'percentage' => '0.1',
                'country_id' => '19',
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'title' => 'Khasi',
                'is_official' => 'F',
                'percentage' => '0.1',
                'country_id' => '19',
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'title' => 'Marma',
                'is_official' => 'F',
                'percentage' => '0.2',
                'country_id' => '19',
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'title' => 'Santhali',
                'is_official' => 'F',
                'percentage' => '0.1',
                'country_id' => '19',
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'title' => 'Tripuri',
                'is_official' => 'F',
                'percentage' => '0.1',
                'country_id' => '19',
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],

        ];
        DB::table('country_languages')->insert($items);
    }
}
