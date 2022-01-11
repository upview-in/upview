<?php

namespace App\Traits;

use Illuminate\Contracts\Console\Kernel;
use Illuminate\Foundation\Testing\RefreshDatabaseState;

trait RefreshDatabaseTransactionLess
{
    /**
     * Refresh a conventional test database.
     *
     * @return void
     */
    public function refreshTestDatabase()
    {
        if (!RefreshDatabaseState::$migrated) {
            $this->artisan('migrate:fresh', $this->shouldDropViews() ? [
                '--drop-views' => true,
            ] : []);

            $this->app[Kernel::class]->setArtisan(null);

            RefreshDatabaseState::$migrated = true;
        }
    }
}
