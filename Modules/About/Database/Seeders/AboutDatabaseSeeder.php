<?php

namespace Modules\About\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class AboutDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

         $this->call(AboutModuleModuleSeeder::class);
         $this->call(AboutModulePermissionsSeeder::class);
         $this->call(AboutModuleGroupPermissionsSeeder::class);
         $this->call(AboutModuleUserPermissionsSeeder::class);

    }
}
