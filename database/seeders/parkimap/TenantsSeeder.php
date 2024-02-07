<?php

namespace Database\Seeders\Parkimap;

use App\Models\Tenant;
use Illuminate\Database\Seeder;

class TenantsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $tenants = [
            ['name' => 'first tenant', 'domain' => 'app1.localhost', 'database' => 'tenantOne'],
            ['name' => 'second tenant', 'domain' => 'app2.localhost', 'database' => 'tenantTwo'],
            ['name' => 'second tenant', 'domain' => 'app3.localhost', 'database' => 'tenantThree'],
        ];

        Tenant::insert($tenants);
    }
}
