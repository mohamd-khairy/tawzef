<?php

namespace Modules\ContactUS\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use DB;

class ContactUSModuleModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        Model::unguard();

        // Create contact us in modules table 
        DB::table('modules')->insert([
            'name' => 'ContactUS Module',
            'description' => 'ContactUS Module',
        ]);

        // Create & connect contact us module with user package 
        $module = DB::table('modules')->where('name', 'ContactUS Module')->first();
        $package = DB::table('packages')->first();

    }
}
