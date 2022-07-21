<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class AddExistingTablesToMigrationTable extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'migrate:sync';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add existing tables entry to migration table';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $migrations = scandir(database_path('migrations'));

        foreach ($migrations as $migration_name) {
            if (in_array($migration_name, ['.', '..'])) {
                continue;
            }

            $migration_name = str_replace('.php', '', $migration_name);
            if (!DB::table('migrations')->where('migration', $migration_name)->exists()) {
                DB::table('migrations')->insert([
                    'migration' => $migration_name,
                    'batch' => 1
                ]);
                $this->info('Inserting: ' . $migration_name);
            } else {
                $this->warn('Exists: ' . $migration_name);
            }
        }
    }
}
