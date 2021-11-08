<?php

namespace Database\Seeders;

use App\Models\AdminPermission;
use Illuminate\Database\Seeder;

class PopulateAdminPermissions extends Seeder
{

    // Define list of permissions here
    protected $adminPermissions = [
        [
            'name' => 'Create User',
            'slug' => 'user.create'
        ],
        [
            'name' => 'View Users',
            'slug' => 'user.view'
        ],
        [
            'name' => 'Update User',
            'slug' => 'user.update'
        ],
        [
            'name' => 'Delete User',
            'slug' => 'user.delete'
        ]
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->adminPermissions as $adminPermission) {
            AdminPermission::create($adminPermission);
        }
    }
}
