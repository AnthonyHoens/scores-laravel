<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class LogosList extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'logos:list';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Render a list of the files in the images directory';

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
        $this->info('Voici le contenu du dossier images');
        dump(Storage::allFiles('images/'));
        return 1;
    }
}
