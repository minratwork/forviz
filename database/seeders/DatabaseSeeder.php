<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $this->call(AddMenuListSeeder::class);
        $this->call(AddRolesSeeder::class);
        $this->call(PermissionsSeeder::class);
    }
}
