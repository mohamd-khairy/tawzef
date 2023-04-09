<?php

namespace Modules\CMS\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CMSModuleReportPermissionsSeeder extends Seeder
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
                'id' => 651,
                'parent_id' => null,
                'name' => 'Manage reports',
                'slug' => 'manage-reports',
                'is_hidden' => 0,
                'created_at' => Carbon::now(),
                'module_id' => $module_id
            ],
            [
                'id' => 652,
                'parent_id' => 651,
                'name' => 'Index reports',
                'slug' => 'index-reports',
                'is_Hidden' => 0,
                'created_at' => Carbon::now(),
                'module_id' => $module_id
            ],
            [
                'id' => 653,
                'parent_id' => 651,
                'name' => 'Create report',
                'slug' => 'create-report',
                'is_Hidden' => 0,
                'created_at' => Carbon::now(),
                'module_id' => $module_id
            ],
            [
                'id' => 654,
                'parent_id' => 651,
                'name' => 'Update report',
                'slug' => 'update-report',
                'is_Hidden' => 0,
                'created_at' => Carbon::now(),
                'module_id' => $module_id
            ],
            [
                'id' => 655,
                'parent_id' => 651,
                'name' => 'Delete report',
                'slug' => 'delete-report',
                'is_Hidden' => 0,
                'created_at' => Carbon::now(),
                'module_id' => $module_id
            ],
        ]);
        DB::table('group_permissions')->insert([
            // Technical Support Group Permissions
            ['group_id' => 1, 'permission_id' => 651, 'created_at' => Carbon::now()],
            ['group_id' => 1, 'permission_id' => 652, 'created_at' => Carbon::now()],
            ['group_id' => 1, 'permission_id' => 653, 'created_at' => Carbon::now()],
            ['group_id' => 1, 'permission_id' => 654, 'created_at' => Carbon::now()],
            ['group_id' => 1, 'permission_id' => 655, 'created_at' => Carbon::now()],

            // General Manager Group Permissions
            ['group_id' => 2, 'permission_id' => 651, 'created_at' => Carbon::now()],
            ['group_id' => 2, 'permission_id' => 652, 'created_at' => Carbon::now()],
            ['group_id' => 2, 'permission_id' => 653, 'created_at' => Carbon::now()],
            ['group_id' => 2, 'permission_id' => 654, 'created_at' => Carbon::now()],
            ['group_id' => 2, 'permission_id' => 655, 'created_at' => Carbon::now()],

        ]);

        DB::table('user_permissions')->insert([
            // Technical Support Group Permissions
            ['user_id' => 1, 'permission_id' => 651, 'created_at' => Carbon::now()],
            ['user_id' => 1, 'permission_id' => 652, 'created_at' => Carbon::now()],
            ['user_id' => 1, 'permission_id' => 653, 'created_at' => Carbon::now()],
            ['user_id' => 1, 'permission_id' => 654, 'created_at' => Carbon::now()],
            ['user_id' => 1, 'permission_id' => 655, 'created_at' => Carbon::now()],

            // General Manager Group Permissions
            ['user_id' => 2, 'permission_id' => 651, 'created_at' => Carbon::now()],
            ['user_id' => 2, 'permission_id' => 652, 'created_at' => Carbon::now()],
            ['user_id' => 2, 'permission_id' => 653, 'created_at' => Carbon::now()],
            ['user_id' => 2, 'permission_id' => 654, 'created_at' => Carbon::now()],
            ['user_id' => 2, 'permission_id' => 655, 'created_at' => Carbon::now()],

        ]);
    }
}
