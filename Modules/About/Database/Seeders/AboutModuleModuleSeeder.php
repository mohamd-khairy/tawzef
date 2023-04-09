<?php

namespace Modules\About\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use DB;

class AboutModuleModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // Seed Module
        DB::table('modules')->insert([
            'name' => 'About Module',
            'description' => 'About Module',
        ]);

        // Seed Package Modules
        $module=DB::table('modules')->where('name','About Module')->first();
        $package = DB::table('packages')->first();


    }
}
