<?php

namespace Modules\Ads\Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AdsSeedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        DB::table('ads')->insert([
            [
                'id' => 1,
                'title' => 'Header ad',
                'link' => 'http://sportarenaqatar.com/',
                'is_featured' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()

            ],
            [
                'id' => 2,
                'title' => 'Search first ad',
                'link' => 'http://sportarenaqatar.com/',
                'is_featured' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()

            ],
            [
                'id' => 3,
                'title' => 'Search second ad',
                'link' => 'http://sportarenaqatar.com/',
                'is_featured' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()

            ]
        ]);
    }
}
