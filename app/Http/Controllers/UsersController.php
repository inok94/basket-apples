<?php

namespace App\Http\Controllers;

use App\User;

class UsersController extends Controller
{
    public function getUsers()
    {
        return User::with('storages')->storages();
    }
}