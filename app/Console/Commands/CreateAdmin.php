<?php

namespace App\Console\Commands;

use App\Models\Admin;
use App\Models\AdminRole;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class CreateAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command for create an new admin';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $name = $this->ask('Enter name');
        $username = $this->ask('Enter username');
        $password = $this->secret('Enter password');

        if (Admin::where('username', $username)->count()) {
            $this->error($username . ' is alredy exists!');
            return 1;
        }

        $admin = new Admin();
        $admin->name = $name;
        $admin->username = $username;
        $admin->password = Hash::make($password);
        $admin->save();

        $admin->roles()->attach(AdminRole::where('slug', 'super-admin')->first());

        $this->info('The admin user created successfully!');
        return 0;
    }
}
