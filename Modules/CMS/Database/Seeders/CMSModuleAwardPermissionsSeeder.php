<?php

namespace Modules\CMS\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CMSModuleAwardPermissionsSeeder extends Seeder
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
                'id' => 636,
                'parent_id' => null,
                'name' => 'Manage awards',
                'slug' => 'manage-awards',
                'is_hidden' => 0,
                'created_at' => Carbon::now(),
                'module_id' => $module_id
            ],
            [
                'id' => 637,
                'parent_id' => 636,
                'name' => 'Index awards',
                'slug' => 'index-awards',
                'is_Hidden' => 0,
                'created_at' => Carbon::now(),
                'module_id' => $module_id
            ],
            [
                'id' => 638,
                'parent_id' => 636,
                'name' => 'Create award',
                'slug' => 'create-award',
                'is_Hidden' => 0,
                'created_at' => Carbon::now(),
                'module_id' => $module_id
            ],
            [
                'id' => 639,
                'parent_id' => 636,
                'name' => 'Update award',
                'slug' => 'update-award',
                'is_Hidden' => 0,
                'created_at' => Carbon::now(),
                'module_id' => $module_id
            ],
            [
                'id' => 640,
                'parent_id' => 636,
                'name' => 'Delete award',
                'slug' => 'delete-award',
                'is_Hidden' => 0,
                'created_at' => Carbon::now(),
                'module_id' => $module_id
            ],
        ]);
        DB::table('group_permissions')->insert([
            // Technical Support Group Permissions
            ['group_id' => 1, 'permission_id' => 636, 'created_at' => Carbon::now()],
            ['group_id' => 1, 'permission_id' => 637, 'created_at' => Carbon::now()],
            ['group_id' => 1, 'permission_id' => 638, 'created_at' => Carbon::now()],
            ['group_id' => 1, 'permission_id' => 639, 'created_at' => Carbon::now()],
            ['group_id' => 1, 'permission_id' => 640, 'created_at' => Carbon::now()],

            // General Manager Group Permissions
            ['group_id' => 2, 'permission_id' => 636, 'created_at' => Carbon::now()],
            ['group_id' => 2, 'permission_id' => 637, 'created_at' => Carbon::now()],
            ['group_id' => 2, 'permission_id' => 638, 'created_at' => Carbon::now()],
            ['group_id' => 2, 'permission_id' => 639, 'created_at' => Carbon::now()],
            ['group_id' => 2, 'permission_id' => 640, 'created_at' => Carbon::now()],

        ]);

        DB::table('user_permissions')->insert([
            // Technical Support Group Permissions
            ['user_id' => 1, 'permission_id' => 636, 'created_at' => Carbon::now()],
            ['user_id' => 1, 'permission_id' => 637, 'created_at' => Carbon::now()],
            ['user_id' => 1, 'permission_id' => 638, 'created_at' => Carbon::now()],
            ['user_id' => 1, 'permission_id' => 639, 'created_at' => Carbon::now()],
            ['user_id' => 1, 'permission_id' => 640, 'created_at' => Carbon::now()],

            // General Manager Group Permissions
            ['user_id' => 2, 'permission_id' => 636, 'created_at' => Carbon::now()],
            ['user_id' => 2, 'permission_id' => 637, 'created_at' => Carbon::now()],
            ['user_id' => 2, 'permission_id' => 638, 'created_at' => Carbon::now()],
            ['user_id' => 2, 'permission_id' => 639, 'created_at' => Carbon::now()],
            ['user_id' => 2, 'permission_id' => 640, 'created_at' => Carbon::now()],

        ]);
    }
}
