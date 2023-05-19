<?php
namespace Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Http\Helpers\DBHelpers;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $this->command->info('Seeding...');
        DBHelpers::setFKCheckOff();

        $this->call(GroupsTableDataSeeder::class);
        $this->call(PermissionsTableDataSeeder::class);
        $this->call(GroupPermissionsTableDataSeeder::class);
        $this->call(UsersTableDataSeeder::class);
        $this->call(UserPermissionsTableDataSeeder::class);

        $this->call(ModulesTableDataSeeder::class);
        $this->call(HostnamesDataSeeder::class);
        $this->call(LanguagesDataSeeder::class);

        // Modules Seeders
        $this->call(\Modules\Dashboard\Database\Seeders\DashboardDatabaseSeeder::class);
        $this->call(\Modules\Settings\Database\Seeders\SettingsDatabaseSeeder::class);
        $this->call(\Modules\ContactUS\Database\Seeders\ContactUSDatabaseSeeder::class);
        $this->call(\Modules\CMS\Database\Seeders\CMSModuleModuleSeeder::class);
        $this->call(\Modules\CMS\Database\Seeders\CMSDatabaseSeeder::class);
        $this->call(\Modules\Careers\Database\Seeders\CareersDatabaseSeeder::class);
        $this->call(\Modules\Categories\Database\Seeders\CategoriesDatabaseSeeder::class);


        DBHelpers::setFKCheckOn();
        $this->command->info('All tables seeded!');
        Model::reguard();
    }
}
