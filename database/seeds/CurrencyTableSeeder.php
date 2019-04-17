<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class CurrencyTableSeeder extends Seeder
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
                'title' => 'Bangladeshi Taka',
                'currency_code' => 'BDT',
                'currency_symbol' => '৳',
                'country_id' => '19',
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'title' => 'USA Doller',
                'currency_code' => 'USD',
                'currency_symbol' => '$',
                'country_id' => '226',
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],

        ];
        DB::table('currencies')->insert($items);
    }
}
