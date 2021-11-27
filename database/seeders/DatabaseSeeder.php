<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Common
        (new CountryStateCityTableSeeder())->run();
        (new SeedLanguages())->run();

        // Admin
        (new PopulateAdminPermissions())->run();
        (new PopulateAdminRoles())->run();

        // User
        (new PopulateUserPermissions())->run();
        (new PopulateUsersRoles())->run();

        // Seed example fake users
        User::factory(100)->create();
    }
}
