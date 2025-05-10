<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            UserSeeder::class,
            LocalitySeeder::class,
            // modulesConfigs::class,
            // ModuleSeeder::class,
            // leadershipSeeder::class,
            // OrganizationStructureSeeder::class,
            // CitySeeder::class,
            // OficialSeeder::class,
            // SubOficialSeeder::class,
            // UnitPlanSeeder::class,
        ]);
    }
}
