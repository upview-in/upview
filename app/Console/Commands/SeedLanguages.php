<?php

namespace App\Console\Commands;

use App\Models\Language;
use Illuminate\Console\Command;

class SeedLanguages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'languages:seed';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $data = base_path('resources/data/languages.json');
        $data = json_decode(file_get_contents($data), true);

        foreach ($data as $language) {
            Language::create([
                'code'        => $language['code'],
                'name'        => $language['name'],
                'native_name' => $language['nativeName'],
            ]);
        }

        $this->getOutput()->writeln('<info>Seeded:</info> Languages');

        return 0;
    }
}
