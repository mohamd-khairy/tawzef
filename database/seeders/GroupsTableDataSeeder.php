<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class GroupsTableDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // php artisan db:seed --class=GroupsTableDataSeeder

        DB::table('groups')->insert([
            // Technical Support Group
            [
                'id' => 1,
                'parent_id' => null,
                'name' => 'Technical Support',
                'slug' => 'technical-support',
                'description' => 'Technical Support Group',
                'is_hidden' => 1,
                'created_at' => Carbon::now()
            ],

            // General Managers Group
            [
                'id' => 2,
                'parent_id' => 1,
                'name' => 'General Managers',
                'slug' => 'general-managers',
                'description' => 'General Managers Group',
                'is_hidden' => 0,
                'created_at' => Carbon::now()
            ],


            // offices Group
            [
                'id' => 4,
                'parent_id' => 1,
                'name' => 'Offices',
                'slug' => 'offices',
                'description' => 'Offices Group',
                'is_hidden' => 0,
                'created_at' => Carbon::now()
            ],

            // customer Group
            [
                'id' => 5,
                'parent_id' => 1,
                'name' => 'Customers',
                'slug' => 'customers',
                'description' => 'Customers Group',
                'is_hidden' => 0,
                'created_at' => Carbon::now()
            ],
        ]);
    }
}
