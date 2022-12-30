<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = [
        'id',
        'name',
        'permissions',
    ];

    const DASHBOARD = 'dashboard';
    const PRODUCTS = 'products';
    const ORDERS = 'orders';
    const PERMISSIONS = 'permissions';

    const ADMIN_MENU = [
        self::DASHBOARD,
        self::PRODUCTS,
        self::ORDERS,
        self::PERMISSIONS
    ];

    const PRODUCT_MENU = [
        self::DASHBOARD,
        self::PRODUCTS
    ];

    const ORDER_MENU = [
        self::DASHBOARD,
        self::ORDERS
    ];

    const PERMISSION_MENU = [
        self::DASHBOARD,
        self::PERMISSIONS
    ];

    public function permission()
    {
        return $this->hasMany(Permissions::class);
    }
}
