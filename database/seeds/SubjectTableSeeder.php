<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class SubjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fileNameWithLocation =  base_path('public\readFile\SubjectList.txt');
        $contents = file_get_contents($fileNameWithLocation);
        $subjects = explode(',', $contents);
        foreach ($subjects as $subject ) {
            $items = [
                [
                    'title' => $subject,
                    'created_at' => Carbon::now()->toDateTimeString(),
                    'updated_at' => Carbon::now()->toDateTimeString(),
                ],
            ];

            DB::table('subjects')->insert($items);
        }
    }
}
