<?php

namespace Modules\CMS\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CMSModuleTechnologyPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $module_id = DB::table('modules')->where('name', 'CMS Module')->first()->id;

        // Terms
        DB::table('permissions')->insert([
            [
                'id' => 641,
                'parent_id' => null,
                'name' => 'Manage technologies',
                'slug' => 'manage-technologies',
                'is_hidden' => 0,
                'created_at' => Carbon::now(),
                'module_id' => $module_id
            ],
            [
                'id' => 642,
                'parent_id' => 641,
                'name' => 'Index technologies',
                'slug' => 'index-technologies',
                'is_Hidden' => 0,
                'created_at' => Carbon::now(),
                'module_id' => $module_id
            ],
            [
                'id' => 643,
                'parent_id' => 641,
                'name' => 'Create technology',
                'slug' => 'create-technology',
                'is_Hidden' => 0,
                'created_at' => Carbon::now(),
                'module_id' => $module_id
            ],
            [
                'id' => 644,
                'parent_id' => 641,
                'name' => 'Update technology',
                'slug' => 'update-technology',
                'is_Hidden' => 0,
                'created_at' => Carbon::now(),
                'module_id' => $module_id
            ],
            [
                'id' => 645,
                'parent_id' => 641,
                'name' => 'Delete technology',
                'slug' => 'delete-technology',
                'is_Hidden' => 0,
                'created_at' => Carbon::now(),
                'module_id' => $module_id
            ],
        ]);
        DB::table('group_permissions')->insert([
            // Technical Support Group Permissions
            ['group_id' => 1, 'permission_id' => 641, 'created_at' => Carbon::now()],
            ['group_id' => 1, 'permission_id' => 642, 'created_at' => Carbon::now()],
            ['group_id' => 1, 'permission_id' => 643, 'created_at' => Carbon::now()],
            ['group_id' => 1, 'permission_id' => 644, 'created_at' => Carbon::now()],
            ['group_id' => 1, 'permission_id' => 645, 'created_at' => Carbon::now()],

            // General Manager Group Permissions
            ['group_id' => 2, 'permission_id' => 641, 'created_at' => Carbon::now()],
            ['group_id' => 2, 'permission_id' => 642, 'created_at' => Carbon::now()],
            ['group_id' => 2, 'permission_id' => 643, 'created_at' => Carbon::now()],
            ['group_id' => 2, 'permission_id' => 644, 'created_at' => Carbon::now()],
            ['group_id' => 2, 'permission_id' => 645, 'created_at' => Carbon::now()],

        ]);

        DB::table('user_permissions')->insert([
            // Technical Support Group Permissions
            ['user_id' => 1, 'permission_id' => 641, 'created_at' => Carbon::now()],
            ['user_id' => 1, 'permission_id' => 642, 'created_at' => Carbon::now()],
            ['user_id' => 1, 'permission_id' => 643, 'created_at' => Carbon::now()],
            ['user_id' => 1, 'permission_id' => 644, 'created_at' => Carbon::now()],
            ['user_id' => 1, 'permission_id' => 645, 'created_at' => Carbon::now()],

            // General Manager Group Permissions
            ['user_id' => 2, 'permission_id' => 641, 'created_at' => Carbon::now()],
            ['user_id' => 2, 'permission_id' => 642, 'created_at' => Carbon::now()],
            ['user_id' => 2, 'permission_id' => 643, 'created_at' => Carbon::now()],
            ['user_id' => 2, 'permission_id' => 644, 'created_at' => Carbon::now()],
            ['user_id' => 2, 'permission_id' => 645, 'created_at' => Carbon::now()],

        ]);
    }
}
