<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class ProfileController extends Controller
{
    //View profile data
    public function ViewProfile(){
        $id = Auth::user()->id;
        $user = User::find($id);

        return view('backend.user.user_profile', compact('user'));
    }

    //Edit profile
    public function EditProfile(){
        $id = Auth::user()->id;
        $editUser = User::find($id);

        return view('backend.user.edit_profile', compact('editUser'));
    }
}
