<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Permissions;
use App\Models\Roles;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function getMenuList(Request $request)
    {
        $role = Roles::where('name', $request->role)->firstOrFail();
        $permissions = Permissions::where('role_id', $role->id)
            ->pluck('menu_id')
            ->toArray();
        $menuList = Menu::whereIn('id', $permissions)->get();

        return $menuList;
    }
}
