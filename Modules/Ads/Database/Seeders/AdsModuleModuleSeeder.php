<?php

namespace Modules\Ads\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use DB;

class AdsModuleModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // Seed Module Ads 
        DB::table('modules')->insert([
            'name' => 'Ads Module',
            'description' => 'Ads Module',
        ]);

        // Attach module to packages module
        $module = DB::table('modules')->where('name', 'Ads Module')->first();
        $package = DB::table('packages')->first();

    }
}
