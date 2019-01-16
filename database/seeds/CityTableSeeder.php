<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use  Faker\Factory;
use App\Models\Country;
class CityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        $countries = Country::all()->pluck('id')->toArray();
        foreach (range(1, 30) as $index) {
            $items = [
                [
                    'country_id' => $faker->randomElement($countries),
                    'name' => $faker->city,
                    'created_at' => Carbon::now()->toDateTimeString(),
                    'updated_at' => Carbon::now()->toDateTimeString(),
                ],
            ];

            DB::table('cities')->insert($items);
        }
    }
}
