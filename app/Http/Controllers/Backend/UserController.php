<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
    //Fetch all users

    public function ViewUser(){
        // $users = User::latest()->get();
        $users = User::where('user_type','Admin')->get();
        return view('backend.user.view_user', compact('users'));
    }
    //Show user add form

    public function AddUser(){
        return view('backend.user.add_user');
    }

    //Store user into the database
    public function StoreUser(Request $request){

        $validateData = $request->validate([
            'email' => 'required|unique:users',
            'name' => 'required',
        ]);

        $data = new User();

        $code = rand(0000,9999);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->role = $request->role;
        $data->user_type = 'Admin';
        $data->password = bcrypt($code);
        $data->code = $code;

        $data->save();

        $notification = array(
            'message' => 'User added successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('user.view')->with($notification);
    }


    public function EditUser($id) {
        $editUser = User::find($id);

        return view('backend.user.edit_user', compact('editUser'));

    }

    // Update the user 
    public function UpdateUser(Request $request,$id){
        $data = User::find($id);

        $data->name = $request->name;
        $data->email = $request->email;
        $data->role = $request->role;
        $data->save();
        return redirect()->route('user.view');
    }
    // Delete the user 
    public function DeleteUser($id){
        $data = User::find($id);

      $data->delete();
        return redirect()->route('user.view');
    }
}