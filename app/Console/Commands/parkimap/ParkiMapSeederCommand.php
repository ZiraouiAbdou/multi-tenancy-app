<?php

namespace App\Console\Commands\parkimap;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class ParkiMapSeederCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'parkimap:seed {class}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $class = $this->argument('class');
        $this->info('seeding to parkimap');
        $this->info('-----------------------------------');

        Artisan::call("db:seed", [
            "--class" => "Database\\Seeders\\Parkimap\\$class",
            "--database" => "maindb",
        ]);
        $this->info(Artisan::output());

        return Command::SUCCESS;
    }
}
