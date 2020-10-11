<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        $users = User::with('roles')
            ->get();

        return view('user.index', compact('users'));
    }

    public function show(User $user) {
        return view('user.show', compact('user'));
    }

    public function edit() {

    }

    public function update() {

    }
}
