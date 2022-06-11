<?php

namespace App\Http\Controllers\Backend\Setups;

use App\Http\Controllers\Controller;
use App\Models\Designation;
use Illuminate\Http\Request;

class DesignationController extends Controller
{
    //fetch all designations
    public function ViewDesignation(){
        $designations = Designation::latest()->get();
        return view('backend.setup.designation.view_designation',compact('designations'));
    }

     //Show designation add form
     public function AddDesignation(){
        return view('backend.setup.designation.add_designation');
    }

       //Store designation
       public function StoreSchoolSubject(Request $request){
      
        $validateData = $request->validate([
            'name' => 'required|unique:school_subjects,name',
        ]);

        $data = new Designation();

        $data->name = $request->name;

        $data->save();

        $notification = array(
            'message' => 'Designation added successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('designation.view')->with($notification);
    }

}