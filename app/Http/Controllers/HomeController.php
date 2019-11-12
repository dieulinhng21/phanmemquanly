<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Role;
use App\Permission;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $role = Role::find(1);
        $permission = Permission::find(1);
        $role->givePermissionTo($permission);
        return view('home');
    }
}
