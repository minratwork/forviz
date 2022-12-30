<?php

namespace Database\Seeders;

use App\Models\Menu;
use App\Models\Permissions;
use App\Models\Roles;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->addAdminPermission();
        $this->addProductPermission();
        $this->addOrderPermission();
    }

    public function addOrderPermission()
    {
        $orderRole = Roles::where('name', Roles::ORDER_MANAGEMENT)->first();
        $orderMenuList = Menu::whereIn('name', Menu::ORDER_MENU)->get();
        foreach($orderMenuList as $orderMenu) {
            Permissions::updateOrCreate([
                'role_id' => $orderRole->id,
                'menu_id' => $orderMenu->id
            ]);
        }
    }

    public function addProductPermission()
    {
        $productRole = Roles::where('name', Roles::PRODUCT_MANAGEMENT)->first();
        $productMenuList = Menu::whereIn('name', Menu::PRODUCT_MENU)->get();
        foreach($productMenuList as $productMenu) {
            Permissions::updateOrCreate([
                'role_id' => $productRole->id,
                'menu_id' => $productMenu->id
            ]);
        }
    }

    public function addAdminPermission()
    {
        $adminRole = Roles::where('name', Roles::ADMIN)->first();
        $adminMenuList = Menu::whereIn('name', Menu::ADMIN_MENU)->get();

        foreach($adminMenuList as $adminMenu) {
            Permissions::updateOrCreate([
                'role_id' => $adminRole->id,
                'menu_id' => $adminMenu->id
            ]);
        }
    }
}
