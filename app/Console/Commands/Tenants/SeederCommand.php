<?php

namespace App\Console\Commands\tenants;

use App\Models\Tenant;
use App\Services\TenantService;
use Database\Seeders\Parkimap\TenantsSeeder;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class SeederCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tenants:seed {class}';

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
        $tenants = Tenant::get();
        $tenants->each(function ($tenant) use ($class) {
            TenantService::switchToTenant($tenant);
            $this->info('seeding to : ' . $tenant->domain);
            $this->info('-----------------------------------');

            Artisan::call("db:seed", [
                "--class" => "Database\\Seeders\\Tenants\\$class",
                "--database" => "tenant",
            ]);
            $this->info(Artisan::output());

            return Command::SUCCESS;
        });
    }
}
