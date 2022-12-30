<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $role = $request->role ? $request->role : 'admin';
        return view('product', ['role' => $role]);
    }
}
