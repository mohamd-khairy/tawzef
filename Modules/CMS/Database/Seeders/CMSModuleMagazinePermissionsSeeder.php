<?php

namespace Modules\CMS\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CMSModuleMagazinePermissionsSeeder extends Seeder
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
                'id' => 646,
                'parent_id' => null,
                'name' => 'Manage magazines',
                'slug' => 'manage-magazines',
                'is_hidden' => 0,
                'created_at' => Carbon::now(),
                'module_id' => $module_id
            ],
            [
                'id' => 647,
                'parent_id' => 646,
                'name' => 'Index magazines',
                'slug' => 'index-magazines',
                'is_Hidden' => 0,
                'created_at' => Carbon::now(),
                'module_id' => $module_id
            ],
            [
                'id' => 648,
                'parent_id' => 646,
                'name' => 'Create magazine',
                'slug' => 'create-magazine',
                'is_Hidden' => 0,
                'created_at' => Carbon::now(),
                'module_id' => $module_id
            ],
            [
                'id' => 649,
                'parent_id' => 646,
                'name' => 'Update magazine',
                'slug' => 'update-magazine',
                'is_Hidden' => 0,
                'created_at' => Carbon::now(),
                'module_id' => $module_id
            ],
            [
                'id' => 650,
                'parent_id' => 646,
                'name' => 'Delete magazine',
                'slug' => 'delete-magazine',
                'is_Hidden' => 0,
                'created_at' => Carbon::now(),
                'module_id' => $module_id
            ],
        ]);
        DB::table('group_permissions')->insert([
            // Technical Support Group Permissions
            ['group_id' => 1, 'permission_id' => 646, 'created_at' => Carbon::now()],
            ['group_id' => 1, 'permission_id' => 647, 'created_at' => Carbon::now()],
            ['group_id' => 1, 'permission_id' => 648, 'created_at' => Carbon::now()],
            ['group_id' => 1, 'permission_id' => 649, 'created_at' => Carbon::now()],
            ['group_id' => 1, 'permission_id' => 650, 'created_at' => Carbon::now()],

            // General Manager Group Permissions
            ['group_id' => 2, 'permission_id' => 646, 'created_at' => Carbon::now()],
            ['group_id' => 2, 'permission_id' => 647, 'created_at' => Carbon::now()],
            ['group_id' => 2, 'permission_id' => 648, 'created_at' => Carbon::now()],
            ['group_id' => 2, 'permission_id' => 649, 'created_at' => Carbon::now()],
            ['group_id' => 2, 'permission_id' => 650, 'created_at' => Carbon::now()],

        ]);

        DB::table('user_permissions')->insert([
            // Technical Support Group Permissions
            ['user_id' => 1, 'permission_id' => 646, 'created_at' => Carbon::now()],
            ['user_id' => 1, 'permission_id' => 647, 'created_at' => Carbon::now()],
            ['user_id' => 1, 'permission_id' => 648, 'created_at' => Carbon::now()],
            ['user_id' => 1, 'permission_id' => 649, 'created_at' => Carbon::now()],
            ['user_id' => 1, 'permission_id' => 650, 'created_at' => Carbon::now()],

            // General Manager Group Permissions
            ['user_id' => 2, 'permission_id' => 646, 'created_at' => Carbon::now()],
            ['user_id' => 2, 'permission_id' => 647, 'created_at' => Carbon::now()],
            ['user_id' => 2, 'permission_id' => 648, 'created_at' => Carbon::now()],
            ['user_id' => 2, 'permission_id' => 649, 'created_at' => Carbon::now()],
            ['user_id' => 2, 'permission_id' => 650, 'created_at' => Carbon::now()],

        ]);
    }
}
