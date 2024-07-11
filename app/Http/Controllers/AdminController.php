<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Response;
use Inertia\Inertia;
use App\Http\Resources\UserResource;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class AdminController extends Controller
{
    public function index(): Response
    {
         return Inertia::render('Admin/AdminIndex',
        [
            'users' =>User::count(),
            'roles'=>Role::count(),
            'permissions'=>Permission::count(),
        ]
    );
       
    }
}
