<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AdminController extends Controller
{
    public function dashboard()
    {
        return Inertia::render('Admin/Dashboard', [
            // Pass any data your dashboard needs here
            'stats' => [
                'users_count' => \App\Models\User::count(),
            ]
        ]);
    }

    public function users()
    {
        return Inertia::render('Admin/Users', [
            'users' => \App\Models\User::all(),
        ]);
    }

    public function settings()
    {
        return Inertia::render('Admin/Settings');
    }
}
