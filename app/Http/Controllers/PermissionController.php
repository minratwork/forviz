<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function index(Request $request)
    {
        $role = $request->role ? $request->role : 'admin';
        return view('permission', ['role' => $role]);
    }
}
