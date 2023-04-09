<?php

namespace Modules\Ads\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AdsModulePermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $module_id = DB::table('modules')->where('name','Ads Module')->first()->id;

        DB::table('permissions')->insert([
            // Manage Ads
            [
                'id' => 308,
                'parent_id' => null,
                'name' => 'Manage Ads',
                'slug' => 'manage-ads',
                'is_hidden' => 0,
                'created_at' => Carbon::now(),
                'module_id' => $module_id
            ],
            [
                'id' => 309,
                'parent_id' => 308,
                'name' => 'Index Ads',
                'slug' => 'index-ads',
                'is_Hidden' => 0,
                'created_at' => Carbon::now(),
                'module_id' => $module_id
            ],
            [
                'id' => 310,
                'parent_id' => 308,
                'name' => 'Create ad',
                'slug' => 'create-ad',
                'is_Hidden' => 0,
                'created_at' => Carbon::now(),
                'module_id' => $module_id
            ],
            [
                'id' => 311,
                'parent_id' => 308,
                'name' => 'Update ad',
                'slug' => 'update-ad',
                'is_Hidden' => 0,
                'created_at' => Carbon::now(),
                'module_id' => $module_id
            ],
            [
                'id' => 312,
                'parent_id' => 308,
                'name' => 'Delete ad',
                'slug' => 'delete-ad',
                'is_Hidden' => 0,
                'created_at' => Carbon::now(),
                'module_id' => $module_id
            ],
        ]);
    }
}
