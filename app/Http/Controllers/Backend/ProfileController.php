<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
// use Auth;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;

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
    public function ChnagePassword(){
        return view('backend.user.edit_password');
    }

    //Update password
    public function UpdatePassword(Request $request){
        $validateData = $request->validate([
            'current_password' => 'required',
            'password' => 'required|confirmed'
        ]);

        $hashedPassword = Auth::user()->password;
 return dd($hashedPassword);
        if(Hash::check($request->current_password, $hashedPassword)){
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();

            $notification = array(
                'message' => 'Your password has been changed successfully',
                'alert-type' => 'success'
            );

            
            return redirect()->route('login')->with($notification);
        }else{
            return redirect()->back();
        }
        return view('backend.user.edit_password');
    }
}
