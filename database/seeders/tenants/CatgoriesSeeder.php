<?php

namespace Database\Seeders\Tenants;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CatgoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Category::factory(10)->create();
    }
}
