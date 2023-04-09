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
        $this->call(\Modules\Blog\Database\Seeders\BlogDatabaseSeeder::class);
        $this->call(\Modules\Socials\Database\Seeders\SocialsDatabaseSeeder::class);
        $this->call(\Modules\Settings\Database\Seeders\SettingsDatabaseSeeder::class);
        $this->call(\Modules\ContactUS\Database\Seeders\ContactUSDatabaseSeeder::class);
        $this->call(\Modules\Attachments\Database\Seeders\AttachmentsDatabaseSeeder::class);
        $this->call(\Modules\Locations\Database\Seeders\LocationsDatabaseSeeder::class);
        $this->call(\Modules\SEO\Database\Seeders\SeoDatabaseSeeder::class);
        $this->call(\Modules\CMS\Database\Seeders\CMSModuleModuleSeeder::class);
        $this->call(\Modules\Products\Database\Seeders\ProductsDatabaseSeeder::class);
        $this->call(\Modules\Ads\Database\Seeders\AdsDatabaseSeeder::class);
        $this->call(\Modules\Orders\Database\Seeders\OrdersDatabaseSeeder::class);
        $this->call(\Modules\CMS\Database\Seeders\CMSDatabaseSeeder::class);


        DBHelpers::setFKCheckOn();
        $this->command->info('All tables seeded!');
        Model::reguard();
    }
}