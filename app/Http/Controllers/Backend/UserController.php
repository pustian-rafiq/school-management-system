<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
    //Fetch all users

    public function ViewUser(){
        $users = User::all();
        return view('backend.user.view_user', compact('users'));
    }
}
