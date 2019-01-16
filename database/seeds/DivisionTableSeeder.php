<?php

use Illuminate\Database\Seeder;
use App\Models\Division;
class DivisionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Division::create( [
            'id'=>1,
            'name'=>'Barishal',
            'local_name'=>'বরিশাল',
            'country_id'=>18
        ] );
        Division::create( [
            'id'=>2,
            'name'=>'Chattogram',
            'local_name'=>'চট্টগ্রাম',
            'country_id'=>18
        ] );
        Division::create( [
            'id'=>3,
            'name'=>'Dhaka',
            'local_name'=>'ঢাকা',
            'country_id'=>18
        ] );
        Division::create( [
            'id'=>4,
            'name'=>'Khulna',
            'local_name'=>'খুলনা',
            'country_id'=>18
        ] );
        Division::create( [
            'id'=>5,
            'name'=>'Rajshahi',
            'local_name'=>'রাজশাহী',
            'country_id'=>18
        ] );
        Division::create( [
            'id'=>6,
            'name'=>'Rangpur',
            'local_name'=>'রংপুর',
            'country_id'=>18
        ] );
        Division::create( [
            'id'=>7,
            'name'=>'Sylhet',
            'local_name'=>'সিলেট',
            'country_id'=>18
        ] );
        Division::create( [
            'id'=>8,
            'name'=>'Mymensingh',
            'local_name'=>'ময়মনসিংহ',
            'country_id'=>14
        ] );
    }
}
