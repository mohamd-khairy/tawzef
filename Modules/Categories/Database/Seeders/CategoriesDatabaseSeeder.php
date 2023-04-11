<?php

namespace Modules\Categories\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class CategoriesDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        Model::unguard();


        DB::table('permissions')->insert([
            // Manage Categories
            [
                'id' => 17,
                'parent_id' => null,
                'name' => 'Manage Categories',
                'slug' => 'manage-categories',
                'is_hidden' => 0,
                'created_at' => Carbon::now(),
                'module_id' => 4
            ],
            [
                'id' => 18,
                'parent_id' => 17,
                'name' => 'Index Categories',
                'slug' => 'index-categories',
                'is_Hidden' => 0,
                'created_at' => Carbon::now(),
                'module_id' => 4
            ],
            [
                'id' => 19,
                'parent_id' => 17,
                'name' => 'Create category',
                'slug' => 'create-category',
                'is_Hidden' => 0,
                'created_at' => Carbon::now(),
                'module_id' => 4
            ],
            [
                'id' => 20,
                'parent_id' => 17,
                'name' => 'Update category',
                'slug' => 'update-category',
                'is_Hidden' => 0,
                'created_at' => Carbon::now(),
                'module_id' => 4
            ],
            [
                'id' => 21,
                'parent_id' => 17,
                'name' => 'Delete category',
                'slug' => 'delete-category',
                'is_Hidden' => 0,
                'created_at' => Carbon::now(),
                'module_id' => 4
            ],
        ]);
        DB::table('group_permissions')->insert([
            // Technical Support Group Permissions
            ['group_id' => 1, 'permission_id' => 17, 'created_at' => Carbon::now()],
            ['group_id' => 1, 'permission_id' => 18, 'created_at' => Carbon::now()],
            ['group_id' => 1, 'permission_id' => 19, 'created_at' => Carbon::now()],
            ['group_id' => 1, 'permission_id' => 20, 'created_at' => Carbon::now()],
            ['group_id' => 1, 'permission_id' => 21, 'created_at' => Carbon::now()],


            // General Manager Group Permissions
            ['group_id' => 2, 'permission_id' => 17, 'created_at' => Carbon::now()],
            ['group_id' => 2, 'permission_id' => 18, 'created_at' => Carbon::now()],
            ['group_id' => 2, 'permission_id' => 19, 'created_at' => Carbon::now()],
            ['group_id' => 2, 'permission_id' => 20, 'created_at' => Carbon::now()],
            ['group_id' => 2, 'permission_id' => 21, 'created_at' => Carbon::now()],
        ]);

        DB::table('user_permissions')->insert([
            // Technical Support Group Permissions
            ['user_id' => 1, 'permission_id' => 17, 'created_at' => Carbon::now()],
            ['user_id' => 1, 'permission_id' => 18, 'created_at' => Carbon::now()],
            ['user_id' => 1, 'permission_id' => 19, 'created_at' => Carbon::now()],
            ['user_id' => 1, 'permission_id' => 20, 'created_at' => Carbon::now()],
            ['user_id' => 1, 'permission_id' => 21, 'created_at' => Carbon::now()],


            // General Manager Group Permissions
            ['user_id' => 2, 'permission_id' => 17, 'created_at' => Carbon::now()],
            ['user_id' => 2, 'permission_id' => 18, 'created_at' => Carbon::now()],
            ['user_id' => 2, 'permission_id' => 19, 'created_at' => Carbon::now()],
            ['user_id' => 2, 'permission_id' => 20, 'created_at' => Carbon::now()],
            ['user_id' => 2, 'permission_id' => 21, 'created_at' => Carbon::now()],
        ]);
    }
}
