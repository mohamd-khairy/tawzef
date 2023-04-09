<?php

namespace Modules\CMS\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CMSModuleSocialPermissionsSeeder extends Seeder
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
                'id' => 656,
                'parent_id' => null,
                'name' => 'Manage socials content',
                'slug' => 'manage-socials-content',
                'is_hidden' => 0,
                'created_at' => Carbon::now(),
                'module_id' => $module_id
            ],
            [
                'id' => 657,
                'parent_id' => 656,
                'name' => 'Index socials content',
                'slug' => 'index-socials-content',
                'is_Hidden' => 0,
                'created_at' => Carbon::now(),
                'module_id' => $module_id
            ],
            [
                'id' => 658,
                'parent_id' => 656,
                'name' => 'Create social content',
                'slug' => 'create-social-content',
                'is_Hidden' => 0,
                'created_at' => Carbon::now(),
                'module_id' => $module_id
            ],
            [
                'id' => 659,
                'parent_id' => 656,
                'name' => 'Update social content',
                'slug' => 'update-social-content',
                'is_Hidden' => 0,
                'created_at' => Carbon::now(),
                'module_id' => $module_id
            ],
            [
                'id' => 660,
                'parent_id' => 656,
                'name' => 'Delete social content',
                'slug' => 'delete-social-content',
                'is_Hidden' => 0,
                'created_at' => Carbon::now(),
                'module_id' => $module_id
            ],
        ]);
        DB::table('group_permissions')->insert([
            // Technical Support Group Permissions
            ['group_id' => 1, 'permission_id' => 656, 'created_at' => Carbon::now()],
            ['group_id' => 1, 'permission_id' => 657, 'created_at' => Carbon::now()],
            ['group_id' => 1, 'permission_id' => 658, 'created_at' => Carbon::now()],
            ['group_id' => 1, 'permission_id' => 659, 'created_at' => Carbon::now()],
            ['group_id' => 1, 'permission_id' => 660, 'created_at' => Carbon::now()],

            // General Manager Group Permissions
            ['group_id' => 2, 'permission_id' => 656, 'created_at' => Carbon::now()],
            ['group_id' => 2, 'permission_id' => 657, 'created_at' => Carbon::now()],
            ['group_id' => 2, 'permission_id' => 658, 'created_at' => Carbon::now()],
            ['group_id' => 2, 'permission_id' => 659, 'created_at' => Carbon::now()],
            ['group_id' => 2, 'permission_id' => 660, 'created_at' => Carbon::now()],

        ]);

        DB::table('user_permissions')->insert([
            // Technical Support Group Permissions
            ['user_id' => 1, 'permission_id' => 656, 'created_at' => Carbon::now()],
            ['user_id' => 1, 'permission_id' => 657, 'created_at' => Carbon::now()],
            ['user_id' => 1, 'permission_id' => 658, 'created_at' => Carbon::now()],
            ['user_id' => 1, 'permission_id' => 659, 'created_at' => Carbon::now()],
            ['user_id' => 1, 'permission_id' => 660, 'created_at' => Carbon::now()],

            // General Manager Group Permissions
            ['user_id' => 2, 'permission_id' => 656, 'created_at' => Carbon::now()],
            ['user_id' => 2, 'permission_id' => 657, 'created_at' => Carbon::now()],
            ['user_id' => 2, 'permission_id' => 658, 'created_at' => Carbon::now()],
            ['user_id' => 2, 'permission_id' => 659, 'created_at' => Carbon::now()],
            ['user_id' => 2, 'permission_id' => 660, 'created_at' => Carbon::now()],

        ]);
    }
}
