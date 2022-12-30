<?php

namespace Database\Seeders;

use App\Models\Roles;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AddRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            'admin',
            'product_management',
            'order_management'
        ];

        foreach($roles as $role) {
            Roles::updateOrCreate([
                'name' => $role
            ]);
        }
    }
}
