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

    //Update profile
    public function UpdateProfile(Request $request){
        $id = Auth::user()->id;
        $data = User::find($id);

        $data->name = $request->name;
        $data->email = $request->email;
        $data->address = $request->address;
        $data->mobile = $request->mobile;
        $data->gender = $request->gender;

        if($request->file('image')){
            $image = $request->file('image');
            @unlink(public_path("backend/uploads/users/".$data->image));
            $img_name = date('YmdHi').$image->getClientOriginalName();
            $image->move(public_path("backend/uploads/users"),$img_name);
            $data['image'] = $img_name;
        }
        $data->save();

        $notification = array(
            'message' => 'User profile updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('profile.view')->with($notification);
    }

    //Change password
    public function UpdatePassword(){
        return view('backend.user.edit_password');
    }
}
