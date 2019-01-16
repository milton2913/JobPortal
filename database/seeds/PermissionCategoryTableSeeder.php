<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use Carbon\Carbon;
class PermissionCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissionCategory = [
            [
                'name' => 'Dashboard',//'1'
                'slug' => 'dashboard',
                'detail' =>'This Category using for only Dashboard Access',
                'is_active' => 1,
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'name' => 'Permission Category',//'1'
                'slug' => 'permission category',
                'detail' =>'This Category using for only Permission Category Access',
                'is_active' => '1',
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'name' => 'Permission',//'1'
                'slug' => 'permission',
                'detail' =>'This Category using for only Permission Access',
                'is_active' => '1',
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'name' => 'Roles',//'1'
                'slug' => 'roles',
                'detail' =>'This Category using for only Permission Roles Access',
                'is_active' => '1',
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            /*[
                'name' => 'Users',//'1'
                'slug' => 'users',
                'detail' =>'This Category using for only Permission Users Access',
                'is_active' => '1',
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],*/
        ];
        DB::table('permission_categories')->insert($permissionCategory);
    }
}
