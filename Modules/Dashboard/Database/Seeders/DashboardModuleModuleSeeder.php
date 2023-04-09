<?php

namespace Modules\Dashboard\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use DB;

class DashboardModuleModuleSeeder extends Seeder
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
            'name' => 'Dashboard Module',
            'description' => 'Dashboard Module',
        ]);


    }
}
