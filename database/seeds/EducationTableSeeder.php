<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use Carbon\Carbon;
use App\Models\ResultType;
use App\Models\EducationLevel;
use App\Models\Degree;
class EducationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $educationLevels = EducationLevel::pluck('name','id');
        $resultTypes = ResultType::pluck('name','id');
        $faker = Factory::create();
        $education =[
                'education_level_id' => $faker->randomElement($educationLevels),
                'major' => $faker->randomElement(["Primary","SSC","JSC","CSE", "ET", "CS", "Science", "Civil", "BBA", "Bangle", "English", "Math", "SWE", "Pharmacy"]),
                'institute' => $faker->randomElement(["Dhaka University", "Asian University of Bangladesh", "Dhaka Schools", "DIU", "Khulna University"]),
                'is_foreign_institute' => $faker->randomElement([0,0,0,0,0,0,1,0,0,0,0,0,0,0,0,0,]),
                'achievement' => null,
                'result_type_id' => $faker->randomElement($resultTypes),
                'year' => '22222222222',
                'duration' => $faker->randomElement(["3 Years", "2 Years", "4 Years", "1 Year"]),
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ];
            $degree = Degree::where('education_level_id',$education['education_level_id'])->get()->pluck('name','id');
            $education['degree_id']=$faker->randomElement($degree);
            if ($education['result_type_id']==(1||2||3)){
                $education['mark']= $faker->randomElement([34,40,45,50,55,60,68,69,70,75,80,85,90,90,85]);
            }elseif ($education['result_type_id']==4){
                if($education['education_level_id']==(1||2||3||4)){
                    $education['cgpa']=$faker->randomElement([3.5,3.6,3.75,3.8,4,4.5,4.75,5,4.96]);
                    $education['scale']=5;
                    $education['is_hide'] = $faker->randomElement([0,0,0,1,0,0,1,0,0,0,0,0,0,0,1]);
                }else{
                    $education['cgpa']=$faker->randomElement([3.5,3.6,3.75,3.8,4,2.5,2.92,2.83,3.25,3.75]);
                    $education['scale']=4;
                    $education['is_hide'] = $faker->randomElement([0,0,0,1,0,0,1,0,0,0,0,0,0,0,1]);
                }
            }
        DB::table('educations')->insert($education);
    }
}
