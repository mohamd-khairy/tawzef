<?php

namespace Modules\CMS\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CMSPrivaciesDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        DB::table('cms_managements')->insertOrIgnore([
            [
                'id' => 1,
                'type' => 'privacy_policy',
                'title_en' => 'terms and conditions',
                'description_en' => 'terms and conditions',
                'title_ar' => 'الشروط و الاحكام',
                'description_ar' => 'الشروط و الاحكام'
            ],
            [
                'id' => 2,
                'type' => 'privacy_policy',
                'title_en' => 'Return policy',
                'description_en' => 'Return policy',
                'title_ar' => 'سياسة الإرجاع',
                'description_ar' => 'سياسة الإرجاع'
            ]
        ]);
    }
}
