<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $this->call(CountryTableSeeder::class);
        $this->call(DivisionTableSeeder::class);
        $this->call(DistrictTableSeeder::class);
        $this->call(UpazilaTableSeeder::class);
        $this->call(UnionTableSeeder::class);
        $this->call(PermissionCategoryTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(CityTableSeeder::class);
        $this->call(ServiceTableSeeder::class);

        $this->call(OrganizationTypeTableSeeder::class);
        $this->call(IndustryTypeTableSeeder::class);
        $this->call(IndustryTableSeeder::class);
        $this->call(ResultTypeSeeder::class);

        $this->call(EducationLevelTableSeeder::class);
        $this->call(DegreeTableSeeder::class);

        $this->call(SubjectTableSeeder::class);

        $this->call(CompanySizeTableSeeder::class);

        $this->call(ContactTypeTableSeeder::class);

        $this->call(CurrencyTableSeeder::class);

        $this->call(InstituteTableSeeder::class);

        //$user = factory(App\Models\User::class,5)->create();
//New job post required seeder table

        $this->call(JobTypeTableSeeder::class);
        $this->call(ExpertStatusTableSeeder::class);
        $this->call(CompensationTableSeeder::class);
        $this->call(EmploymentCategorySeederTable::class);//basically it's a job category

    }
}
