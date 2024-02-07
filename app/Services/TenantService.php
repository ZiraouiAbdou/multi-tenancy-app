<?php

namespace App\Services;

use App\Models\Tenant;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class TenantService
{

    static $tenant;

    public static function switchToTenant(Tenant $tenant)
    {
        if (!$tenant instanceof Tenant) {
            throw ValidationException::withMessages(['error' => 'this value is not correct']);
        }
        DB::purge('maindb');
        DB::purge('tenant');
        Config::set('database.connections.tenant.database', $tenant->database);
        Self::$tenant = $tenant;
        DB::reconnect('tenant');
        DB::setDefaultConnection('tenant');
    }

    public static function getTenant()
    {
        return Self::$tenant;
    }
}
