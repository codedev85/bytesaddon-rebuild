<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;

class RoleController extends Controller
{
    //

    public function allRole(){

        $roles = Role::get();

        return view('role.all',compact('roles'));
    }
}
