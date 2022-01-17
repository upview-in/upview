<?php

namespace Database\Seeders;

use App\Models\UserRole;
use Illuminate\Database\Seeder;

class PopulateUsersRoles extends Seeder
{
    // Define list of roles here
    protected $userRoles = [
        [
            'name' => 'Gold',
            'slug' => 'gold',
        ],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->userRoles as $userRole) {
            UserRole::create($userRole);
        }
    }
}
