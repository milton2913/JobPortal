<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class ContactTypeTableSeeder extends Seeder
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
            'title' => 'Email',
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'title' => 'Land Phone',
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'title' => 'Mobile',
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],

        ];
        DB::table('contact_types')->insert($items);
    }
}
