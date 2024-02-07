<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class MaindbMigrateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'maindb:migrate';

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
        // TenantService::switchToTenant($tenant);
        $this->info('Migrating MainDB ');
        $this->info('-----------------------------------');
        Artisan::call("migrate --path=database/migrations/maindb/ --database=maindb");
        $this->info(Artisan::output());
    }
}
