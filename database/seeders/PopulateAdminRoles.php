<?php

namespace Database\Seeders;

use App\Models\AdminRole;
use Illuminate\Database\Seeder;

class PopulateAdminRoles extends Seeder
{
    // Define list of roles here
    protected $adminRoles = [
        [
            'name' => 'Super admin',
            'slug' => 'super-admin',
        ],
        [
            'name' => 'Admin',
            'slug' => 'admin',
        ],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->adminRoles as $adminRole) {
            AdminRole::create($adminRole);
        }
    }
}
