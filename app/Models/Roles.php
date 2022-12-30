<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    const ADMIN = 'admin';
    const PRODUCT_MANAGEMENT = 'product_management';
    const ORDER_MANAGEMENT = 'order_management';
}
