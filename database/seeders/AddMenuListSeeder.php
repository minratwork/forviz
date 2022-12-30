<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AddMenuListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menuList = [
            'dashboard',
            'products',
            'orders',
            'permissions'
        ];

        $menuList = [
            [
                'name' => 'dashboard',
                'url' => '/dashboard'
            ],
            [
                'name' => 'products',
                'url' => '/products'
            ],
            [
                'name' => 'orders',
                'url' => '/orders'
            ],
            [
                'name' => 'permissions',
                'url' => '/permissions'
            ],
        ];

        foreach($menuList as $menu) {
            Menu::updateOrCreate($menu);
        }
    }
}
